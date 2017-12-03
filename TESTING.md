# Pi In The Sky
## Milestone 5

### Team
- [Aparajithan Venkateswaran](https://github.com/AparaV)
- [Jared Cantilina](https://github.com/JaredTCan)
- [Meghan Donohoe](https://github.com/medo5682)
- [Matt Behrens](https://github.com/polarbehrens)
- [Andrew (David) Barlow](https://github.com/dandrewbarlow)

### Vision

**To make server hosting cheaper and accessible.**

There is currently a lack of inexpensive home server solutions that don’t require extensive IT
knowledge to use. We want to create a simple plug and play home server. The idea is that it can
be plugged in and not have to deal with setting up a convoluted server, but a simple interface to
start using it as soon as possible.

## Automated Tests

### Tools Used
* [Python](https://www.python.org/)
* [Selenium](http://www.seleniumhq.org)

**Sample Test**
![demo](milestones/autoTest.gif)

Selenium for Python was used for automated testing. The automated testing was done on Chrome, using Selenium Chrome WebDriver. Selenium makes it easy to select different web elements based on name, id, class, link text, tag name and xpath. It also allows for file upload/download and filling forms. Different tests were created for each feature that was developed. Allowing for quick testing while developing the features.

The tests include:
- Normal user login / failed login / logout
- Server Restart
- Cloud Storage File upload and delete
- Super user login / failed login / logout
- Super user creating a user and deleting users
- Website upload
- Password reset for normal user


## User Acceptance Test Plans

Check the user acceptance test plans [here](milestones/ProjectMilestone05_UAT_plans_PiInTheSky.pdf)