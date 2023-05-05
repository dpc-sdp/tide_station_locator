Feature: Component shows up in Content components field for the Landing Page content type

  Ensure that Landing Page content type has the expected component.

  @api @smoke @landingpage
  Scenario: The Landing Page content type has the expected component.
    Given I am logged in as a user with the "editor" role
    When I visit "node/add/landing_page"
    Then I should see text matching "Content components"
    And I press the "edit-field-landing-page-component-add-more-add-modal-form-area-add-more" button
    And I should see the button "Station locator"
    And save screenshot
