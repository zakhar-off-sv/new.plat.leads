Feature:
  Import lead
  Check 80% of lead import cases

  Scenario: Successful import lead
    When i send a request to "/lead/import"
    Then i should get a response with the status 200