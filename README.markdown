Introduction
------------

Using the Wordpress settings framework can be quite painful. This plugin can make things easier. At least for me, hopefully it is useful to you as well!

License
-------

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.


Usage
-----

Install this as a separate plugin in your Wordpress installation. Use the included classes to create new settings pages, sections and fields.

Use the `PJVSettingsPage` class to register a new options page in the admin sidebar (optional). Settings are created, stored and accessed with `PJVSettingsSection` objects. You can add a section with new settings to any options page. 

The following code registers a new settingspage and add a section with two settings on it: a textfield and a checkbox.

	$page = new PJVSettingsPage('custom-settings-page-id', 'Custom settings page title');
	$sect = $page->new_section('custom-settings-section-id', 'Custom settings section title');

	$sect->new_setting('setting_1_id', 'Option title', 'textfield', 'This is the defaul value', 'This is a helpfull description');
	$sect->new_setting('setting_2_id', '2nd option title', 'checkbox');

Make sure to store the PJVSettingsSection object, you will need it to access the values of the settings.

	// access the current value of the setting
	$sect->get_setting('setting_1_id');

To ensure your code is run at the right time and after this plugin is loaded, use the pjv-settings-loaded hook.

	function eg_settings_api_init() {

		// initiate PJVSettings... objects here
		
	}// eg_settings_api_init()
	add_action('pjv-settings-loaded', 'eg_settings_api_init');
