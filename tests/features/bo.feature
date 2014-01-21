Feature: Back Office Login
  As a website user
  I attempt ro log me in the back office

  @javascript
  Scenario: Give the default login user and pass
    Given I am on "/admin.php/admin/login"
    Then print current URL
    And I wait "2000"
    Then I fill in "_username" with "admin"
    And I fill in "_password" with "admin"
    Then I press "Login"
    And I wait "2000"
    Then I should see "Settings"

