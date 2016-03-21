# Welcome to the Demand Planning micro app.

Basically the purpose of this is to demonstrate that not everything needs to be complicated. This has been created with the intention of people to use it to push the Demand Planning data off to HQ. It is not meant to anything clever like auto forcast. It is just a table you enter data that saves and loads and submits.

## Features

Here are the current features. This is still very much a work in progress (we've only spent a few hours on it so far) and we intend on making it work.

### Built to be used by anyone

This is set up to be completely configurable from one central point - the config.php file. Change the partner ID and your local version is complete.

### Save and Load

We avoided using a database to store this data. The schema is flat and we thought it would be easiest for people to install in wheverever they wanted to without a database. 

The app stores and reads data in JSON files on the server. Each week it creates a new JSON file based off the old one.

### Editable data

Yeah it edits and saves. It is pretty sweet. We could turn off being able to edit the upcoming 8 week.

## Things to do

- __Need to get the JSON updating week on week. Haven't done that yet. Basically it needs to remove the most recently passed week and add a new blank week.__ *DONE*
- __Clean up the weekly demands section of the JSON. I coded it a bit too hastily and added an extra unnecessary level of array. Will sort that out as soon as possible.__ *DONE*
- Set up the post to HQ.
- Robustly test.

## Requirements

A web servering running at least PHP 5.5. Basically put it on a web server and away you go. Super easy. Super lean.

Enjoy.

