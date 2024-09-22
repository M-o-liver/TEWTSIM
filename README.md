# TEWTSIM: Tactical Exercise Without Troops Simulator

TEWTSIM is a cutting-edge web-based application designed to revolutionize military training through immersive tactical decision-making simulations. This innovative tool digitizes Tactical Decision Games (TDGs), providing an interactive platform for soldiers and officers to hone their critical thinking and decision-making skills.

🔐 **Try it out!** Log in to [tewtsim.ca](https://tewtsim.ca) using:
- Codename: "Ranger"
- Password: "Red"

## 🎮 Gameplay

### 👤 Login
- Choose your own codename
- Colors used as passwords for enhanced security
- 🤫 Secret handshake: "What is the MOSID of the Infantry (00180)"

### 🏁 Mission Start Page
- Choose your challenge:
  - 🔵 Platoon-level situations
  - 🟢 Section-level situations
- 📜 Review your past missions

### 📋 Mission Brief Page
| Left Panel | Right Panel |
|------------|-------------|
| Mission Briefing | Notes & Combat Estimate PDF |

⏳ 10-minute countdown to analyze and strategize
💡 Pro tip: Consider Enemy Courses of Action

### ❓ Mission Questions Page
- ⏱️ 10 minutes to answer 8 situational questions
- 📝 Utilize your notes from the briefing
- 🎖️ Craft a FRAG-O for your team

### 🏆 Mission Results Page
- 📖 AI-generated story based on your decisions
- 🤖 AI feedback on your performance:
  - 3 areas for improvement
  - 3 strengths to maintain
- 🎓 Receive your final grade and mission summary

## 🛠️ Key Features

🔄 **Dynamic Mission Loading**
- Missions stored in MariaDB for easy updates and additions

💻 **Interactive Interface**
- Built with PHP, HTML, CSS, and JavaScript
- Responsive design for optimal user experience

🖼️ **Asset Management**
- Efficient handling of images and resources via symbolic links

🔧 **Customizable Scenarios**
- Flexible mission descriptions and parameters through stored HTML content

## 🚀 Join the TEWTSIM Experience

Embrace the future of military training with TEWTSIM. Sharpen your tactical acumen, test your decision-making skills, and prepare for real-world scenarios in a safe, digital environment. Whether you're a seasoned officer or a new recruit, TEWTSIM offers a challenging and educational experience tailored to enhance your military prowess.

Remember, in the world of TEWTSIM, every decision counts. Are you ready to command?

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