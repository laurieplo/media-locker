# -*- mode: ruby -*-
# vi: set ft=ruby :
require 'getoptlong'
customArgs = GetoptLong.new(
  [ '--ansible-tags', GetoptLong::OPTIONAL_ARGUMENT ]
)
ansibleTags=''
customArgs.each do |opt, arg|
  case opt
    when '--ansible-tags'
      ansibleTags=arg
  end
end
# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.
  # Define VM name
  config.vm.define "media-locker"
  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://atlas.hashicorp.com/search.
  config.vm.box = "ubuntu/xenial64"
  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  # config.vm.box_check_update = false
  # Hostname
  config.vm.hostname = 'media-locker.dev'
  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # config.vm.network "forwarded_port", guest: 80, host: 8080
  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.network "private_network", ip: "192.168.33.20"
  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network "public_network"
  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  config.vm.synced_folder ".", "/vagrant", disabled: true
  config.vm.synced_folder ".", "/var/www/media-locker/", id: "vagrant-media-locker", type: "nfs"
  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
   config.vm.provider "virtualbox" do |vb|
     # Display the VirtualBox GUI when booting the machine
     vb.gui = false
     # Customize the amount of memory on the VM:
     vb.memory = "2048"
     vb.cpus = "2"
   end
  #
  # View the documentation for the provider you are using for more
  # information on available options.
  # Define a Vagrant Push strategy for pushing to Atlas. Other push strategies
  # such as FTP and Heroku are also available. See the documentation at
  # https://docs.vagrantup.com/v2/push/atlas.html for more information.
  # config.push.define "atlas" do |push|
  #   push.app = "YOUR_ATLAS_USERNAME/YOUR_APPLICATION_NAME"
  # end
  # http://foo-o-rama.com/vagrant--stdin-is-not-a-tty--fix.html
  config.vm.provision "fix-no-tty", type: "shell" do |s|
     s.privileged = false
     s.inline = "sudo sed -i '/tty/!s/mesg n/tty -s \\&\\& mesg n/' /root/.profile"
  end
  # Enable provisioning with a shell script. Additional provisioners such as
  # Puppet, Chef, Ansible, Salt, and Docker are also available. Please see the
  # documentation for more information about their specific syntax and use.
  config.vm.provision "ansible" do |ansible|
   ansible.playbook = ".ansible/project.yml"
      ansible.verbose = "vv"
      ansible.groups = {
        "env-dev:children" => ["app-web"],
        "app-web" => ["media-locker"]
      }
      if (ansibleTags != '')
          ansible.raw_arguments  = [
            "--tags=#{ansibleTags}",
          ]
      end
  end
  # automatically start apache2
  config.vm.provision "shell", privileged: "true", run: "always", inline: "service apache2 restart"
  config.vm.provision "shell", privileged: "true", inline: "cd /var/www/media-locker && rm -rf vendor && ./composer.phar install --quiet"
end