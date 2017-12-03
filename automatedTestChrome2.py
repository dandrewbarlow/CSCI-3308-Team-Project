from helium.api import *
import time

# test login info
oldPassword = "Stark"
newPassword = "IronMan"
testUser = "test"

def login():
    # logs in the test user
    # checks to see if the welcome text appears to signal a successful login
    go_to("http://73.229.199.171/")
    write(testUser, into="Username")
    time.sleep(.33)
    write(oldPassword, into="Password")
    time.sleep(.33)
    switch_to(find_all(Window())[0])
    click("Login")
    if Text("Welcome " + testUser + "! What's on your mind today?").exists():
            print("Login Works!")

def logout():
    # used to log out normal user to test superuser
    click("Logout")
    if Text("Login").exists() & Text("Pi In The Sky").exists():
        print("Logged the User out")

def failLogin():
    # tries to login with a valid username but different invalid passwords
    go_to("http://73.229.199.171/")
    write(testUser, into="Username")
    write("WRONGPASSWORD", into="Password")
    switch_to(find_all(Window())[0])
    click("Login")
    if Text("Incorrect username or password.").exists():
        print("Successfully Failed to Login")


def resetPassword():
    # opens the reset password page and changes the password
    click("Reset Password")
    write(oldPassword, into="Old Password")
    write(newPassword, into="New Password")
    write(newPassword, into="Repeat New Password")
    switch_to(find_all(Window())[0])
    hover("Reset Password")
    click("Reset Password")
    print("Changed Password to " + newPassword)
    click("Logout")

    # logs in with the new password

    write(testUser, into="Username")
    write(newPassword, into="Password")
    switch_to(find_all(Window())[0])
    time.sleep(.33)
    click("Login")
    if Text("Welcome " + testUser).exists():
        print("Successfully logged in with new password")


    # changes the password back for future tests

    click("Reset Password")
    write(newPassword, into="Old Password")
    write(oldPassword, into="New Password")
    write(oldPassword, into="Repeat New Password")
    switch_to(find_all(Window())[0])
    click("Reset Password")
    print("Reset password back to old password")
    click("Home")

def failAccess():
    # checks if a normal user can access superuser pages
    # tries to go to the unauthorized pages and checks whats on the page
    go_to("http://73.229.199.171/register.php")
    if Text("Add New User").exists():
        print("Unauthorized Access to register.php")
    elif Text("Welcome " + testUser).exists():
        print("Access blocked to register.php")
    time.sleep(1)

    go_to("http://73.229.199.171/allUsers.php")
    if Text("Superusers").exists() & Text("CREATE A NEW USER").exists():
        print("Unauthorized Access to allUsers.php")
    elif Text("Welcome " + testUser).exists():
        print("Access blocked to allUsers.php")
    time.sleep(1)

def uploadFile():
    # goal is to have it upload a file to the cloud storage

    click("Cloud Storage")
    if(Button("Choose File").exists()):
        chick("upload")
    # click(Button("Choose File"))
    # attach_file("C:/Users/mattbehrens/Documents/lab8.c", "uploadFile")
    time.sleep(6)



def deleteFile():
    # goal is to delete a file from the cloud server
    hjhkj


def restartServer():
    # tests the restart server function
    # waits for 2 minutes to try to go to the website
    # need to add a ping to the server to check if it is off and a ping to see when it comes back
    click("Home")
    click("Restart Server")
    time.sleep(120)
    go_to("73.229.199.171")

def createWebsite():
    # goal is to upload a website and delete a website from the webserver
    click("Manage Websites")
    time.sleep(.33)
    click("CREATE A NEW WEBSITE")
    click("Choose File")

def main():
    start_chrome("google.com/?hl=en")
    failLogin()
    login()
    resetPassword()
    #createWebsite()
    #restartServer()
    #uploadFile()
    failAccess()
    logout()
    time.sleep(5)
    kill_browser()

main()