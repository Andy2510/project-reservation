# -*- mode: ruby -*-
# vi: set ft=ruby :

$script = <<SCRIPT
DBPASSWD=root
echo "phpmyadmin phpmyadmin/dbconfig-install boolean true" | debconf-set-selections
echo "phpmyadmin phpmyadmin/app-password-confirm password $DBPASSWD" | debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/admin-pass password $DBPASSWD" | debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/app-pass password $DBPASSWD" | debconf-set-selections
echo "phpmyadmin phpmyadmin/reconfigure-webserver multiselect none" | debconf-set-selections
apt-get -y install phpmyadmin > /dev/null 2>&1
apt-add-repository ppa:ondrej/php -y
apt-get update
apt-get install -y php7.0-cli php7.0-dev php7.0-pgsql php7.0-sqlite3 php7.0-gd php7.0-curl php7.0-memcached php7.0-imap php7.0-mysql php7.0-mbstring php7.0-xml php7.0-zip php7.0-bcmath php7.0-soap php7.0-intl php7.0-readline
composer self-update
SCRIPT

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.33.10"
    config.vm.hostname = "scotchbox"
    config.vm.synced_folder ".", "/var/www", :mount_options => ["dmode=777", "fmode=777"]
    config.vm.provision "shell", inline: $script
    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www", :nfs => { :o:mount_options => ["dmode=777","fmode=777"] }

end
