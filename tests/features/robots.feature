@basic
Feature: Home
  In order to browse the site
  As a website user/crawler
  I need to be able to access and see basic elements

  Scenario: Get robots.txt
    Given I am on "/robots.txt"
    Then the response should not contain regexp "(\n|^)[^#a-zA-Z]*Disallow: /[* ]*(\n|$)"