@p1
Feature: Station locator paragraph type is available.

  Ensure that station locator paragraph type exists.

  @api @nosuggest
  Scenario: The station locator paragraph type exists.
    Given I am logged in as a user with the "Administrator" role
    When I visit "/admin/structure/paragraphs_type"
    And save screenshot
    And I see text "Station locator"
    And I see text "station_locator"
