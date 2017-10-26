Feature: Urls to Https
  In order to get a secure url
  as a User
  It need to contain https Protokoll

  Scenario: Changing Protokoll from http to https
    Given There is a unsecure URL "http://www.test.de"
    When The Protocol of the URL must be converted from "http://" to "https://"
    Then The shoul be as secure as "https://www.test.de"