# User Preferences API Fetcher Plugin

This repository contains a custom WordPress plugin developed to fetch and display user-specific preferences via an external API. The plugin is integrated with WooCommerce and the Storefront theme, providing a seamless experience on the front-end and WooCommerce's "My Account" page.

## Table of Contents

- [Installation](#installation)
- [Setup](#setup)
- [Features](#features)
- [Plugin Workflow](#plugin-workflow)
- [API Integration](#api-integration)
- [Widget Usage](#widget-usage)
- [Contributing](#contributing)
- [License](#license)

## Installation

### Prerequisites

- WordPress (latest version)
- WooCommerce plugin (latest version)
- Storefront theme (latest version)

### Steps

1. Clone the repository:

    ```bash
    git clone https://github.com/qasidsaleh/test-task-saucal.git
    ```

2. Activate the Storefront theme in WordPress.

3. Activate the "User Preferences API Fetcher" plugin from the WordPress admin panel.

## Setup

1. After activation, the plugin adds a new endpoint to WooCommerce's "My Account" page for users to manage their preferences.
2. The plugin uses an external API to fetch data based on these preferences and displays it using a custom widget.

## Features

- **WooCommerce Integration:** Adds user preferences management to WooCommerce's "My Account" page.
- **API Fetching:** Fetches user data from an external API based on preferences.
- **Widget Display:** Displays fetched data in a customizable front-end widget.

## Plugin Workflow

The plugin was developed incrementally, with key features added in separate commits to ensure functionality at each step. Below is a summary of the main commits:

1. **Commit 1:** Initial commit: Added basic plugin setup with activation and deactivation hooks
2. **Commit 2:** Added basic plugin file structure with placeholder classes and methods.
3. **Commit 3:** Enqueue custom stylesheets for the plugin.
4. **Commit 4:** Implemented basic widget functionality.
5. **Commit 5:** Added custom rewrite endpoint for user preferences
6. **Commit 6:** Added user preferences page to wooCommerce my account
7. **Commit 7:** Added a placeholder for the API handler class
8. **Commit 8:** Handle form submission for user preferences in main plugin class
9. **Commit 9:** Show user preferences in wooCommerce my account
10. **Commit 10:** added save preferences functionality
11. **Commit 11:** Shows user data in widget
12. **Commit 12:** added custom style for form
13. **Commit 13:** added API handler functionality
14. **Commit 14:** Modify the UPAF_API_Handler class to handle POST requests to the API
15. **Commit 15:** Updated Widget functionality to fetch data from API
16. **Commit 16:** Added some refinements and coments

## API Integration

- **API URL:** `https://httpbin.org/post`
- **Purpose:** The API is used to push user preferences and retrieve corresponding data, which is then displayed on the front-end through a widget.

### API Workflow

- **Push Data:** User preferences are sent to the API using a POST request.
- **Fetch Data:** Fetched data from the API is processed and displayed in the widget.

## Widget Usage

1. Navigate to `Appearance > Widgets` in the WordPress admin panel.
2. Drag and drop the `User Data Widget` to your desired widget area.
3. The widget will display the fetched data based on user preferences.

### Conditions for Display

- The widget checks the fetched data, and if the value corresponds to `username`, `email`, or `nickname`, it displays the respective user data in a professional format.

## Contributing

Contributions are welcome! To contribute:

1. Fork the repository.
2. Create a feature branch (`git checkout -b feature/new-feature`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature/new-feature`).
5. Create a new Pull Request.
