from helium.api import *
import time


def logout():
    # used to log out normal user to test superuser
    click("Logout")

def superUserTest():

    # logs in superuser
    go_to("http://73.229.199.171/")
    write("god", into="Username")
    write("FrodoBaggins", into="Password")
    time.sleep(.33)
    switch_to(find_all(Window())[0])
    time.sleep(1)
    click("Login")

    #creates a new user

    click("Manage Users")
    click("CREATE A NEW USER")
    write("Bruce Wayne", into="Name")
    write("Bruce@DC.com", into="Email")
    write("Batman", into="Username")
    write("12345", into="Password")
    write('12345', into="Repeat Password")
    time.sleep(3)
    click("REGISTER NEW USER")
    click("Manage Users")
    if Text("Bruce Wayne").exists():
        print("Successfully Created User")

    # figuring out how to delete a specific user
    # can hover over a users delete button but cant click on it???
    """h1 = S('@10')
    hover(h1)
    time.sleep(5)
    h2 = S('@11')
    hover(h2)"""
    delete1 = S('@32')
    click(delete1)
    time.sleep(10)
    if Text("Bruce Wayne").exists():
        print("Failed to delete user")
    else:
        print("Deleted user")



def main():
    start_chrome("google.com/?hl=en")
    superUserTest()
    logout()
    time.sleep(5)
    kill_browser()

main()