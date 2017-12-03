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
print("logged in normal user")
elem = driver.find_element_by_link_text("Manage Websites").click()
elem = driver.find_element_by_link_text("CREATE A NEW WEBSITE").click()
elem = driver.find_element_by_name("siteName").send_keys("test_site")
elem = driver.find_element_by_name("siteFile").send_keys("/Users/mattbehrens/Documents/testWebsite.zip")
elem = driver.find_element_by_name("upload-website").click()
print("uploaded website")
time.sleep(10)
driver.close()