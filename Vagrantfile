Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu/trusty64"

  config.vm.network :private_network, ip: "10.10.10.200"

  config.vm.network "forwarded_port", guest: 80, host: 1987

  #config.cache.auto_detect = true

  config.vm.provider :virtualbox do |v|
    v.memory = 1024
  end

  #config.vm.provider :virtualbox do |v|
  #  v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
  #  v.customize ["modifyvm", :id, "--memory", 256]
  #  v.customize ["modifyvm", :id, "--name", "my-first-box"]
  #end

  ## For masterless, mount your salt file root
  config.vm.synced_folder "./", "/var/www/neuron",
    id: "vagrant-root",
    owner: "vagrant",
    group: "www-data",
    mount_options: ["dmode=775,fmode=664"]

  ## Use all the defaults:
  #config.vm.provision :salt do |salt|

  #  salt.minion_config = "salt/minion"
  #  salt.run_highstate = true
  #  salt.verbose = true

  #end

end
