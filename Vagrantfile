# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "smoogie/sourcebox"
    config.vm.network "private_network", ip: "192.168.33.20"
    # config.vm.hostname = "sourcebox"

    config.vm.synced_folder ".", "/var/www", :mount_options => ["dmode=777", "fmode=777"]
    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }

    # Port forwarding to make your app available outside your host
    # config.vm.network "forwarded_port", guest: 80, host: 8888
end