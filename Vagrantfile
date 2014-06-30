# -*- mode: ruby -*-
# vi: set ft=ruby :
require 'yaml'

dir = File.dirname(File.expand_path(__FILE__))

configValues = YAML.load_file("#{dir}/vagrant/puppet/config/config.yaml")
data = configValues['vagrant']

Vagrant.configure("2") do |config|
    config.vm.box = "#{data['vm']['box']}"
    config.vm.box_url = "#{data['vm']['box_url']}"

    data['vm']['network']['forwarded_port'].each do |i, port|
        if port['guest'] != '' && port['host'] != ''
            config.vm.network :forwarded_port, guest: port['guest'].to_i, host: port['host'].to_i
        end
    end

    # Create a private network, which allows host-only access to the machine
    # using a specific IP.
    if data['vm']['network']['private_network'].to_s != ''
        config.vm.network :private_network, ip: "#{data['vm']['network']['private_network']}"
    end

    # Set Timezone
    # if data['vm']['timezone'] != ''
    #     config.vm.provision :shell,
    #         :inline => "echo #{data['vm']['timezone']} | sudo tee /etc/timezone && sudo dpkg-reconfigure --frontend noninteractive tzdata"
    # end

    # Share an additional folder to the guest VM. The first argument is
    # the path on the host to the actual folder. The second argument is
    # the path on the guest to mount the folder. And the optional third
    # argument is a set of non-required options.
    data['vm']['synced_folder'].each do |i, folder|
        if folder['source'] != '' && folder['target'] != ''
            nfs = (folder['nfs'] == "true") ? "nfs" : nil
            if nfs == "nfs"
                config.vm.synced_folder "#{folder['source']}", "#{folder['target']}", id: "#{i}", type: nfs
            else
                config.vm.synced_folder "#{folder['source']}", "#{folder['target']}", id: "#{i}", type: nfs,
                    group: "#{folder['group']}", owner: "#{folder['owner']}", mount_options: ["dmode=755", "fmode=644"]
            end
        end
    end

    # Provider-specific configuration so you can fine-tune various
    # backing providers for Vagrant. These expose provider-specific options.
    # Example for VirtualBox:
    #
    config.vm.provider :virtualbox do |vb|
        vb.customize [
            "modifyvm", :id,
            "--memory", "#{data['vm']['memory']}",
            "--cpus", "#{data['vm']['cpus']}",
            "--ioapic", "on"

        ]
    end

    config.vm.provision :puppet do |puppet|
        puppet.manifests_path = "#{data['vm']['provision']['puppet']['manifests_path']}"
        puppet.module_path = "#{data['vm']['provision']['puppet']['module_path']}"
        puppet.manifest_file = "#{data['vm']['provision']['puppet']['manifest_file']}"
        if !data['vm']['provision']['puppet']['options'].empty?
            puppet.options = data['vm']['provision']['puppet']['options']
        end
    end
end
