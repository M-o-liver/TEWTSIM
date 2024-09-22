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

## Potential Future Enhancements

- **Expanded TDG Library**: Possible collaboration with military officers to develop a wider range of TDG problems and solutions.
- **AI Integration**: Potential implementation of Protected B AI language models to generate diverse scenarios.
- **Advanced Reasoning Capabilities**: Possible incorporation of step-by-step reasoning modules to improve scenario evaluation.

## Training Potential

TEWTSIM aims to serve as a tool for:
1. Developing critical thinking skills in tactical situations
2. Practicing decision-making under time constraints
3. Exploring various strategic approaches
4. Preparing for real-world military exercises
5. Creating institutional data that could potentially be used for organizational analysis

By providing a platform for practice and analysis, TEWTSIM may contribute to the development of military personnel's decision-making skills.

## Future Prospects

The application has the potential to become a useful component in military training programs, offering a cost-effective solution for tactical exercise simulations. As AI technology advances, TEWTSIM could evolve to support both human officers and AI systems in developing military strategy and decision-making capabilities.

## Installation Instructions

Steps (WINDOWS ONLY, database may require reconfiguration for Linux use):
1. Install XAMPP. Only install Apache2, PHP, and MySQL/MariaDB
2. Git Clone https://github.com/M-o-liver/TEWTSIM to the 'htdocs' folder
3. Begin the XAMPP control panel
4. Click 'admin' on SQL and navigate to the PhpMyAdmin page
5. Create a new database called "mission_app"
6. Import C:/xampp/htdocs/TEWTSIM-main/sql/mission_app.sql to this database. Ensure Foreign Key checks are on. 
7. Click 'config' on Apache2 on the XAMPP control panel and edit httpd.conf
8. Navigate to where you first see DocumentRoot = "C:/xampp/htdocs"> and change it to DocumentRoot "C:/xampp/htdocs/TEWTSIM-main". Do so on the line below as well.
9. Get an OpenAI key, create a text file in a new folder /xampp/htdocs/TEWTSIM-main/keys/openaikey.txt and paste in your key.
10. Restart Apache on the XAMPP control panel.
11. The application should now be functional on http://localhost. Sign in and try it out!