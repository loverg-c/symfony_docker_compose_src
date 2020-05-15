Feature: Users feature

  Scenario: Adding and validate a new user
    Given I add "Content-Type" header equal to "application/json"
    And I send a "POST" request to "api/register" with body:
    """
    {
      "phoneNumber": "+33612457845",
      "password": "password"
    }
    """
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON nodes should contain:
      | message | user created |
    And the JSON node "token" should exist
    And the JSON node "smsCode" should exist
    And I save a "smsCode" from response to context
    Given I am successfully logged in with identity: "+33612457845", and password: "password"
    And I add "Content-Type" header equal to "application/json"
    And I am successfully Validate sms user
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON nodes should contain:
      | message | user updated |
    And the JSON node "token" should exist

  Scenario: Update password
    Given I add "Content-Type" header equal to "application/json"
    And I send a "POST" request to "api/lost-password" with body:
    """
    {
      "phoneNumber": "+336123456789"
    }
    """
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON nodes should contain:
      | message | Nous vous avons envoyé un sms de validation |
    And the JSON node "smsCode" should exist
    And I save a "smsCode" from response to context
    Given I add "Content-Type" header equal to "application/json"
    And I am successfully update password with:
      | phoneNumber | +336123456789 |
      | password    | newPassword  |
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON nodes should contain:
      | message | user modified |
    And the JSON node "token" should exist

  Scenario: Simulation France connect success
    Given I am authenticated by france connect token with:
      | given_name   | Angela                      |
      | family_name  | DUBOIS                      |
      | sub          | 166c758247fb07a0646380552ez |
      | email        | wossewodda-3728@yopmail.com |
      | gender       | female                      |
      | birthdate    | 1962-08-24                  |
      | birthplace   | 75107                       |
      | birthcountry | 99100                       |
    And I send a "GET" request to "success"
    Then the response status code should be 200
    And I am successfully loggedIn with token from response
    And I add "Content-Type" header equal to "application/json"
    And I send a "POST" request to "api/link" with body:
    """
    {
      "phoneNumber": "+3309896765",
      "password": "somepassword"
    }
    """
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON nodes should contain:
      | message | user updated |
    And the JSON node "token" should exist
    Given I am successfully logged in with identity: "166c758247fb07a0646380552ez", and password: "somepassword"
    And I send a "GET" request to "api/users/me"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON nodes should contain:
      | identity     | 166c758247fb07a0646380552ez |
      | phoneNumber  | +3309896765                 |
      | gender       | FEMALE                      |
      | birthPlace   | 75107                       |
      | birthCountry | 99100                       |
      | openId       | 166c758247fb07a0646380552ez |
      | firstName    | Angela                      |
      | lastName     | DUBOIS                      |
      | email        | wossewodda-3728@yopmail.com |
