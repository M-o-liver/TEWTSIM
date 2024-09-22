# TEWTSIM: Tactical Exercise Without Troops Simulator

TEWTSIM is a web-based application designed to support military training through simulated tactical decision-making exercises. This tool aims to bring Tactical Decision Games (TDGs) into a digital format, offering an interactive platform for soldiers and officers to practice their skills.

Log in-to tewtsim.ca with "Ranger" as your codename, and "Red" as your password to see example complete situations!

## Gameplay

**Login**:
- Users can login with a name of their choice. Passwords have been replaced with colors to minimize the risk of compromising real-world passwords on a website run on XAMPP.
- A 'secret handshake' sign-up question is used to minimize online threat surface: "What is the MOSID of the Infantry (00180)"

**Mission Start Page**:
- Allows users to choose between situations at the platoon or section level, and review their past missions.

**Mission Brief Page**:
- Split into two sections: Mission Briefing on the left, and notes/Combat Estimate PDF on the right. 
- Users have 10 minutes to analyze the situation and make notes. Possible suggestion: Enemy Courses of Action.

**Mission Questions Page**:
- Users have 10 minutes to answer 8 questions about the situation using their notes (questions are designed to mirror deductions from the Estimate process).
- Users are then asked to produce a FRAG-O for their team.

**Mission Results Page**:
- An AI-generated story attempts to provide a realistic outcome based on the user's answers.
- The AI provides feedback on the user's responses compared to a doctrinal solution, offering 3 points to improve and 3 points to sustain.
- Users receive a final grade and summary.

## Key Features

- **Dynamic Mission Loading**: Missions are loaded from a MariaDB database, allowing for updates and additions to training scenarios.
- **Interactive Interface**: Built with PHP, HTML, CSS, and JavaScript to provide a responsive user experience.
- **Asset Management**: Uses symbolic links in the database to manage assets.
- **Customizable Scenarios**: Stored HTML content in the database enables flexible mission descriptions and parameters.

## Future Enhancements

🚀 **Expanded TDG Library**
- Collaborate with military officers to develop a diverse range of Tactical Decision Game (TDG) problems and solutions

🤖 **AI Integration**
- Implement Protected B AI language models for generating varied scenarios

🧠 **Advanced Reasoning Capabilities**
- Incorporate step-by-step reasoning modules to enhance scenario evaluation

## Training Potential

TEWTSIM is designed to enhance:

1. 🎯 Critical thinking in tactical situations
2. ⏱️ Decision-making under time pressure
3. 🌐 Exploration of strategic approaches
4. 🏋️ Preparation for real-world military exercises
5. 📊 Creation of institutional data for potential organizational analysis

By offering a platform for practice and analysis, TEWTSIM aims to contribute to the development of military personnel's decision-making skills.

## Future Prospects

💡 TEWTSIM has the potential to become a valuable component in military training programs:
- Cost-effective solution for tactical exercise simulations
- Platform for developing military strategy and decision-making capabilities
- Adaptable to support both human officers and AI systems as technology advances

## Installation Guide (Windows Only)

1. Install XAMPP (Apache2, PHP, and MySQL/MariaDB only)
2. Clone repository: `git clone https://github.com/M-o-liver/TEWTSIM` to the 'htdocs' folder
3. Launch XAMPP control panel
4. Access PhpMyAdmin via SQL 'admin' button
5. Create a new database: "mission_app"
6. Import `C:/xampp/htdocs/TEWTSIM-main/sql/mission_app.sql` (ensure Foreign Key checks are on)
7. Edit Apache2 `httpd.conf`:
   - Set `DocumentRoot` to `"C:/xampp/htdocs/TEWTSIM-main"`
8. Create `/xampp/htdocs/TEWTSIM-main/keys/openaikey.txt` with your OpenAI key
9. Restart Apache in XAMPP control panel
10. Access application at `http://localhost`

⚠️ Note: Database may require reconfiguration for Linux use

## Adding a Scenario

Scenarios are managed through the `missions` table in the database:

1. Develop a tactical decision game:
   - Situation, mission, extra details
   - Find a suitable map
   - Create a comprehensive answer key
2. Use AI to convert the scenario into HTML format
3. Insert new row in the `missions` database:
   - Set mission ID and name
   - Add HTML for situation, mission, and details
   - Include map reference (`/maps/yourmap.png`)
   - Add answer key file name (`answerkey_X.txt`)
4. Access new scenario via `mission.php?id=X`

💡 Tip: Refer to `answers/desertplatoon.txt` for HTML structure in the database