# Pi in the Sky
A simple Raspberry Pi based home server.

The end goal of this project is a simple home server that requires minimal setup. It can be used for a variety of purposes, such as cloud storage, automated backups, web hosting, etc. It will include tools to help the end user set up a home server with almost zero technical knowledge on their part. The server will also be accessible outside of the user’s home network through an admin dashboard.

## The Team
- [Andrew (David) Barlow](https://github.com/dandrewbarlow)
- [Matt Behrens](https://github.com/polarbehrens)
- [Jared Cantilina](https://github.com/JaredTCan)
- [Meghan Donohoe](https://github.com/medo5682)
- [Aparajithan Venkateswaran](https://github.com/AparaV)

## Repository Structure:
* [`milestones/`](milestones/) folder constains all of our milestone reports. It also contains Milestone 5 UAT plans. Milestone 5 can be found in [`TESTING.md`](TESTING.md)
* [`documentRoot`](documentRoot/) folder contains all of our website code
* [`autoTests`](autoTests/) folder contains the scripts we used for testing our features
* [`gitScripts`](gitScripts/) folder contains shell scripts that check for updates in the Git remote
* [`mysqlScripts`](mysqlScripts/) folder contains scripts that we used to create and initialize our databases

## Testing
Login with these credentials onto [http://73.229.199.171/](http://73.229.199.171/):
```
username: Grader
password: timetograde
```

## How To's

* SSH
```shell
$ ssh username@ip
```
`ip: 73.229.199.171`
Default username is `pi`. Get password from one of the admins (team members). If you are an admin, you should use your own username. Obtain it from [Jared](https://github.com/JaredTCan).

## Contributing
See [CONTRIBUTING.md](CONTRIBUTING.md)

## License
Licensed under MIT. See [LICENSE](LICENSE) for more details.
