#!/bin/bash
#
#  Script to automatically pull website from github repo.
#  Works by pulling from the git repo to a local repo, 
#  then using tar to replace the contents of a directory
#  to the document root
#
#  Jared Cantilina
#

cd /home/pi/Pi-in-the-Sky/
git pull
cd /home/pi/Pi-in-the-Sky/documentRoot/
tar -cvf documentRoot.tar .
cd /usr/local/apache/htdocs/
rm -rf * 
mv /home/pi/Pi-in-the-Sky/documentRoot/documentRoot.tar ./
tar -xvf documentRoot.tar

