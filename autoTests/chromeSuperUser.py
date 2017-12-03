from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import json
import time

configFile = "config.json"
with open(configFile, "r") as f:
    config = json.load(f)

driver = webdriver.Chrome()
driver.get("http://73.229.199.171/")
assert "Pi In The Sky" in driver.title
elem = driver.find_element_by_name("username").send_keys(config["usernameSuper"])
elem = driver.find_element_by_name("password").send_keys(config["passwordSuper"])
elem = driver.find_element_by_name("login").click()
print("logged in superuser")
time.sleep(3)

driver.get("http://73.229.199.171/allUsers.php")
elem = driver.find_element_by_link_text("CREATE A NEW USER").click()
elem = driver.find_element_by_name("name").send_keys("Jon Snow")
elem = driver.find_element_by_name("email").send_keys("jon@HouseStark.com")
elem = driver.find_element_by_name("username").send_keys("kingofthenorth")
elem = driver.find_element_by_name("password1").send_keys("GameOfThrones")
elem = driver.find_element_by_name("password2").send_keys("GameOfThrones")
elem = driver.find_element_by_name("register").click()
print("created a new user")

time.sleep(10)
elem = driver.find_element_by_link_text("Logout").click()
driver.close()