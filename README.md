# TEWTSIM: Tactical Exercise Without Troops Simulator

TEWTSIM is an innovative web-based application designed to enhance military training through simulated tactical decision-making exercises. This powerful tool brings Tactical Decision Games (TDGs) into the digital age, offering a dynamic and interactive platform for soldiers, officers, and military strategists to hone their skills.

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
- See AI criticize your story, and answers compared to a doctrinal solution. Get 3 points to improve and 3 points to sustain. Recieve a final grade and summary. 

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

By providing a platform for repeated practice and analysis, TEWTSIM contributes to the development of more effective and adaptable military personnel.

## Future Prospects

The application has the potential to become a  component in military training programs, offering a cost-effective and scalable solution for tactical exercise simulations. As AI technology advances, TEWTSIM could evolve into a sophisticated training ground for both human officers and AI systems, fostering the development of advanced military strategy and decision-making capabilities. 