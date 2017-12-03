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
elem = driver.find_element_by_name("username").send_keys(config["usernameNormal"])
elem = driver.find_element_by_name("password").send_keys(config["passwordNormal"])
elem = driver.find_element_by_name("login").click()
print("logged normal user in")
time.sleep(3)

elem = driver.find_element_by_link_text("Reset Password").click()
elem = driver.find_element_by_name("password_old").send_keys(config["passwordNormal"])
elem = driver.find_element_by_name("password_new1").send_keys(config["passwordNormal2"])
elem = driver.find_element_by_name("password_new2").send_keys(config["passwordNormal2"])
elem = driver.find_element_by_name("reset-password").click()
print("changed the password")
time.sleep(3)

elem = driver.find_element_by_link_text("Logout").click()
print("logged the user out")

elem = driver.find_element_by_name("username").send_keys(config["usernameNormal"])
elem = driver.find_element_by_name("password").send_keys(config["passwordNormal2"])
elem = driver.find_element_by_name("login").click()
print("logged in user with new password")
time.sleep(3)

elem = driver.find_element_by_link_text("Reset Password").click()
elem = driver.find_element_by_name("password_old").send_keys(config["passwordNormal2"])
elem = driver.find_element_by_name("password_new1").send_keys(config["passwordNormal"])
elem = driver.find_element_by_name("password_new2").send_keys(config["passwordNormal"])
elem = driver.find_element_by_name("reset-password").click()
elem = driver.find_element_by_link_text("Logout").click()
elem = driver.find
print("changed password back and logged out the user")

time.sleep(5)
driver.close()