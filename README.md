# UConn Wordpress Boilerplate for Vagrant
This configures a Vagrant box similar to what you would find in UConn's production hosting environment. This can also be used for general Wordpress development. Use this box as a starting point for your projects. It installs Wordpress as a git submodule into the project, leaving you with an empty themes folder for where you can start your theme or plugin development.

Please log any questions or issues at

### Dependencies

* [Ruby 1.9.3+](http://ruby-lang.org/)
* [Ruby Gems](http://rubygems.org/)
* [Virtual Box](https://www.virtualbox.org/)
* [Vagrant](https://www.vagrantup.com/)

### Installation

1. `$ git clone git@github.com:uconn/uconn-wordpress-base.git`
2. `$ cd uconn-wordpress-base`
3. `$ git submodule update --init --recursive`
4. `$ vagrant up`
5. Once the machine is booted, you can view the new Wordpress installation at http://localhost:8089

## Developer Notes

### Using this box for your own projects

After cloning this repository, change the git origin to your own repository to continue developing with your own separate version control. This may be useful when developing new themes or plugins. You could either version control your theme or plugin and use the [Github Updater](https://github.com/afragen/github-updater) plugin to keep your plugins up to date in this virtual machine, or you could commit all of the files (including the vagrant files and submodules) into your own repository and track it that way by changing the git origin.

### Project Structure

    |+ uconn-wordpress-base
        |- vagrant (git submodule)
        |+ www
            \..
            |+ content
                \..
                |- plugins (your plugins go here)
                |- themes (your themes go here)
                |- uploads (Wordpress will upload files here)
            |- wordpress (git submodule)

### Theming
Wordpress is installed as a git submodule in the `www` directory. This means that all of your site content will be stored in `www/content`. You will not need to do anything with the `wordpress` folder.

### Media
Wordpress will automatically store anything uploaded using the built-in media manager into `www/content/uploads`.

### Plugins
Wordpress will install all of your new plugins into `www/content/plugins`.

---

## License

> The MIT License (MIT)
>
> Copyright (c) 2014 University of Connecticut
>
> Permission is hereby granted, free of charge, to any person obtaining a copy
> of this software and associated documentation files (the "Software"), to deal
> in the Software without restriction, including without limitation the rights
> to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
> copies of the Software, and to permit persons to whom the Software is
> furnished to do so, subject to the following conditions:
>
> The above copyright notice and this permission notice shall be included in all
> copies or substantial portions of the Software.
>
> THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
> IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
> FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
> AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
> LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
> OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
> SOFTWARE.
