# TEWTSIM: Tactical Exercise Without Troops Simulator

TEWTSIM is a web-based application designed to enhance military training through simulated tactical decision-making exercises. This powerful tool brings Tactical Decision Games (TDGs) into the digital age, offering a dynamic and interactive platform for soldiers and officers to hone their skills.

## Gameplay

**Login**:
- Allows users to login with a name of choice. Passwords have been replaced with colours to minimize risk of people comprismising real-world passwords on a website run on XAMPP.
- 'Secret handshake' Sign-up question to minimize online-threat-surface from using my API-key: "What is the MOSID of the Infantry (00180)"
**Mission Start Page**
- Allows users to pick between situations at the platoon or section level, and review their past missions.

**Mission Brief Page**
- Split in two containers: Mission Briefing on the left, and notes/Combat Estimate PDF on the right. 
- Users have 10 minutes to analyze the situation, and produce their best guess at what useful notes will be. Possible suggestion: En CoAs.

**Mission Questions Page**
- Given 10 minutes, answer 8 quesitons about the situation using your notes (questions mimick deductions from the Estimate process)
- Finally, produce a FRAG-O to your team.

**Mission Results page**
- See AI write out your story, rating your answers and giving your mission a realistic outcome. Be warned, a lack of effort can result in a disasterous story!
- See AI criticize your story and answers compared to a doctrinal solution. Get 3 points to improve and 3 points to sustain. Recieve a final grade and summary. 

## Key Features

- **Dynamic Mission Loading**: Missions are loaded dynamically from a MariaDB database, allowing for easy updates and additions to the training scenarios.
- **Interactive Interface**: Built with PHP, HTML, CSS, and JavaScript to provide a responsive and user-friendly experience.
- **Asset Management**: Utilizes symbolic links in the database to efficiently load and manage assets.
- **Customizable Scenarios**: Stored HTML content in the database enables flexible and customizable mission descriptions and parameters.

## Potential Enhancements

- **Expanded TDG Library**: Collaboration with military officers to brainstorm and develop a wider range of high-quality TDG problems and solutions.
- **AI Integration**: Implementation of Protected B AI language models to generate more diverse and challenging scenarios.
- **Advanced Reasoning Capabilities**: Incorporation of step-by-step reasoning modules to improve the AI's ability to plan and evaluate military responses.

## Training Value

TEWTSIM serves as a valuable tool for:
1. Developing critical thinking skills in tactical situations;
2. Practicing decision-making under pressure;
3. Exploring various strategic approaches;
4. Preparing for real-world military exercises; and
5. Creating valuable institutional data that can be used to develop organization-specific artificial intelligence.

By providing a platform for repeated practice and analysis, TEWTSIM could contribute to the development of more effective and adaptable military personnel.

## Future Prospects

The application has the potential to become a  component in military training programs, offering a cost-effective and scalable solution for tactical exercise simulations. As AI technology advances, TEWTSIM could evolve into a sophisticated training ground for both human officers and AI systems, fostering the development of advanced military strategy and decision-making capabilities. 

## Installation instructions

Steps (WINDOWS ONLY, Database must be reconfigured IOT use Linux):
1. Install XAMPP. Only install Apache2, PHP, and MySQL/MariadB
2. Git Clone https://github.com/M-o-liver/TEWTSIM to the 'htdocs' folder
3. Begin the XAMPP control panel
4. Click 'admin' on SQL and navigate to the PhpMyAdmin page
5. Create a new database called "mission_app"
6. Import C://xampp/htdocs/TEWTSIM-main/sql/mission_app.sql to this database. Ensure Foreign Key checks are on. 
7. Click 'config' on Apache2 on the XAMPP control panel and edit httpd.conf
8. Navigate down to where you first see <DocumentRoot = "C:/xampp/htdocs>" and change it to "C://xampp/htdocs/TEWTSIM-main/". Do so on the line below as well.
9. Finally, get an Openai key, and create a text file in a new folder /xampp/htdocs/TEWTSIM-main/keys/openaikey.txt and paste in your key.
10. Application should be functional on http://localhost Sign-in and try it out!