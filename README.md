# TEWTSIM: Tactical Exercise Without Troops Simulator

## Project Overview

TEWTSIM is a web-based application developed to support the Canadian Armed Forces' training initiatives, specifically designed for the Infantry School. This tool digitizes Tactical Decision Games (TDGs), providing an interactive platform for Canadian soldiers and officers to enhance their critical thinking and decision-making skills in tactical situations.

This project is being developed under the guidance of Warrant Outar, Platoon Warrant of OPP at the Infantry School, whose expertise and support have been invaluable in ensuring the tool's relevance and effectiveness for military training purposes.

🔐 **Access Information:** The application is currently available at [tewtsim.ca](https://tewtsim.ca).
- For demonstration purposes, use:
  - Codename: "Ranger"
  - Password: Select "Red"
- Feel free to make your own account.

## Key Features and Functionality

### User Authentication
- Customizable codenames for users
- Simplified password system using colors (to be replaced with OAuth2 for enhanced security upon wider adoption)
- Specialized access for Canadian Armed Forces personnel

### Mission Structure
1. **Mission Start Page**
   - Selection of platoon-level or section-level tactical situations
   - Access to mission history

2. **Mission Brief Page**
   - Comprehensive mission briefing
   - Tools for note-taking and combat estimate preparation

3. **Mission Questions Page**
   - Time-constrained tactical decision-making scenarios
   - FRAG-O creation exercise

4. **Mission Results Page**
   - AI-generated outcome based on user decisions
   - Constructive feedback on performance
   - Final assessment and mission summary

## Technical Specifications

- **Backend:** PHP with MariaDB for dynamic mission management
- **Frontend:** HTML, CSS, and JavaScript, ensuring responsive design
- **Asset Management:** Efficient handling via symbolic links
- **Scenario Customization:** Flexible mission parameters through stored HTML content

## Future Enhancements

- Expansion of TDG library in collaboration with Canadian Armed Forces officers
- Integration of Protected B AI language models for scenario generation
- Implementation of advanced reasoning capabilities
- Upgrade to modern frontend (React, Bootstrap) and backend (Node.js) frameworks
- Potential migration to serverless SQL service for improved efficiency

## Training Benefits

TEWTSIM aims to enhance:
1. Critical thinking in tactical scenarios
2. Decision-making under pressure
3. Strategic approach exploration
4. Preparation for field exercises
5. Data collection for organizational analysis

## Installation Guide (Windows Environment)

1. Install XAMPP
   - Select Apache2, PHP, and MySQL/MariaDB components during installation

2. Clone the TEWTSIM repository
   - Execute in command prompt: `git clone https://github.com/M-o-liver/TEWTSIM`
   - Clone into the 'htdocs' folder of your XAMPP installation

3. Configure XAMPP
   - Launch XAMPP control panel
   - Start Apache and MySQL services

4. Set up the database
   - Access phpMyAdmin via the MySQL 'Admin' button in XAMPP
   - Create a new database named "mission_app"
   - Import the SQL file: `C:/xampp/htdocs/TEWTSIM-main/sql/mission_app.sql`
   - Ensure Foreign Key checks are enabled during import

5. Configure Apache
   - Open Apache's `httpd.conf` file
   - Locate the `DocumentRoot` directive
   - Set it to: `DocumentRoot "C:/xampp/htdocs/TEWTSIM-main"`
   - Save the file

6. Set up API key
   - Create a new file: `/xampp/htdocs/TEWTSIM-main/keys/openaikey.txt`
   - Insert your OpenAI API key into this file

7. Restart Apache
   - In the XAMPP control panel, stop and restart the Apache service

8. Access the application
   - Open a web browser and navigate to `http://localhost`

Note: For deployment on Linux systems, database configuration may require adjustments. Consult your system administrator or IT support for assistance with Linux deployment.

## Scenario Management

TEWTSIM scenarios are managed through the `missions` table in the database. To add a new scenario:

1. Develop the Tactical Decision Game (TDG)
   - Create a detailed situation description
   - Define the mission parameters
   - Compile any additional relevant details
   - Select an appropriate map for the scenario
   - Develop a comprehensive answer key

2. Prepare the scenario content
   - Utilize AI assistance to convert the scenario into HTML format
   - Ensure all content is properly formatted and structured

3. Add the new scenario to the database
   - Insert a new row into the `missions` table with the following information:
     - Assign a unique mission ID
     - Provide a descriptive mission name
     - Insert the HTML-formatted situation, mission, and additional details
     - Include the map reference (e.g., `/maps/scenario_map.png`)
     - Specify the answer key file name (e.g., `answerkey_X.txt`, where X is the mission ID)

4. Upload associated files
   - Place the map image in the appropriate directory
   - Add the answer key file to the designated folder

5. Test the new scenario
   - Access the new scenario via `mission.php?id=X` (replace X with the assigned mission ID)
   - Verify all content displays correctly
   - Ensure the mission flow functions as intended

Best Practices:
- Maintain consistency in HTML structure across scenarios
- Follow the established format for situations and answer keys (refer to `answers/desertplatoon.txt` and `answers/answerkey_1.txt` for examples)
- Regularly backup the database and associated files
- Consider version control for scenario content to track changes over time

For assistance with scenario development or technical implementation, please consult me at oliver.cross@forces.gc.ca 

## Acknowledgments

This project is being developed to support the training initiatives of the Canadian Armed Forces, with particular focus on the needs of the Infantry School. Special thanks to Warrant Outar, Platoon Warrant of OPP at the Infantry School, for providing invaluable guidance and expertise throughout the development process.

## Disclaimer

This application is a training tool and does not replace official Canadian Armed Forces doctrine or training programs. All users must adhere to proper security protocols and handling of military information.