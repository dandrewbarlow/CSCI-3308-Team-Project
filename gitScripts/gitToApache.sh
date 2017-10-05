#!/bin/bash
#
#  Script to automatically pull website from github repo.
#  Works by pulling from the git repo to a local repo, 
#  then using tar to replace the contents of a directory
#  to the document root
#
#  Jared Cantilina
#

echo "Pulling data from git"
cd /home/pi/Pi-in-the-Sky/
git pull | grep "Already up-to-date." && exit 0

echo "Tarring git repo"
cd /home/pi/Pi-in-the-Sky/documentRoot/
tar -cvf documentRoot.tar .

echo "cleaning documentroot"
cd /usr/local/apache/htdocs/
rm -rf * 

echo "Unpacking"
mv /home/pi/Pi-in-the-Sky/documentRoot/documentRoot.tar ./
tar -xvf documentRoot.tar

echo "Cleaning up"
rm documentRoot.tar

echo "done!"
