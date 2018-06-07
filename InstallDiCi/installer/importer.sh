#!/bin/bash
#-----> Created by dici <-----#
mkdir installErrors
sudo chmod -R 777 installErrors
apt-get update -y
apt-get upgrade -y

apt-get install wget -y
sudo apt-get install unzip -y

cd ..
cd ..
cd ..
cd ..
cd root
cd /var
cd www
cd html

git clone https://github.com/diciws/DiCi.git
sudo chmod -R 777 DiCi

apt-get update -y
apt-get upgrade -y