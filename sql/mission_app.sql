-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 06:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mission_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `answer`) VALUES
(34, 1, 1, 'To cause chaos in my ranks, and garner support for their cause. They know contact is always against our favour internationally, and seek to cause civilian damage.'),
(35, 1, 2, 'To patrol the city and provide saftey and security to the residents. Establish areas and zones of control where we can work with city officials and stakeholders in order to implement the changes they need to deter the enemy.'),
(36, 1, 3, 'They want me to be aggresive, and seek them out. Given the proximity of the mosque I expect them to get to us try to direct fire and damage the mosque indirectly.'),
(37, 1, 4, 'PR, Morale victory, disruption of our morale, disruption of our peace-making process.'),
(38, 1, 5, 'We need to fix the enemy in the building with minimal collateral damage. Stop the spread. '),
(39, 1, 6, 'They will lure my soldiers into fights with taunting, and as it seems, children.'),
(40, 1, 7, 'in 20 minutes? Develop a small rally, raise awareness. End of the day? Beginnings of organized anti ISAF protests. End of week? Ideally int\'l news coverage of ISAF \"warcrimes\"'),
(41, 1, 8, 'Now? Minimize further collateral damage. At base? Speak to soldiers about media policy, clarify intent and rationale for our being at the battle. Ensure soldiers believe and understand that we are doing this for good reasons. This will prevent soldier-based, issues.'),
(42, 1, 9, '1 Section, fix the enemy. 2 section move west to the river. 3 Section move north west and secure the front towards the mosque. When 2 and 3 section are in place, radio up. H-hour will be 1 minute after confirmation. 2 section will invade building, 3 will stop counter-attack. Once en is dest/VSA, we will  leave 1 sect in the bldg, WO to CASEVAC the boys over the bridge with 2 section overwatch, and 3 section back on me to prep the defensive area for a counter-attack.'),
(43, 1, 1, 'To destroy our forces. After, to ensure they recieve a propaganda victory.'),
(44, 1, 2, 'To patrol the area and reaffir our strength to civilians. Help them, give water, provide security. Deal with people who may be collecting rents off them.'),
(45, 1, 3, 'I must keep civilians happy, and destroy the enemy at the same time.'),
(46, 1, 4, 'Hurt us, hurt our reputation, hurt my platoons morale.'),
(47, 1, 5, 'I need to fix the enemy in that building, then destory them with minimal other casualites.'),
(48, 1, 6, 'Distract. Maybe via children, explosion, IED, or otherwise to make a hasty escape. '),
(49, 1, 7, 'In 20 minutes? Begin collecting a crowd, EOD I\'d think minor protest or unhappy locals, rest of the week could be anti-ISAF violence.'),
(50, 1, 8, 'Explain our reason for being in the area, how we\'re helping. At the base help my soldier\'s understand why we did what we did.'),
(51, 1, 9, '1 Sect, fix the enemy. Prep your guys for CASEVAC. 2 and 3 link up and push west of 1 sections position. 2 section get ready to give a fireteam for CASEVAC. 3 section prep to infiltrate the building and destroy the enemy. H-Hour is in 10 minutes. GO GO GO !'),
(52, 3, 1, 'The enemy goal is to disrupt our forces in the AO.'),
(53, 3, 2, 'My commander\'s intent is to destroy the enemy.'),
(54, 3, 3, 'My orders and actions are the enemys main intent. They want me to cause civilian damage, and hurt our international credibility for operations.'),
(55, 3, 4, 'PR.'),
(56, 3, 5, 'Remove their freedom of movement in the press.'),
(57, 3, 6, 'By withdrawing.'),
(58, 3, 7, 'In 20 minutes, we see a collection of people around the bodies. By End of Day there is slight rumbling of social discontent in the area, by end of week there are ANTI-ITSAF protests.'),
(59, 3, 8, 'Win hearts and minds.'),
(60, 3, 9, '1 section, fix the enemy. 2 and 3 section perform a pinscer manouver and destroy the enenmy.'),
(61, 5, 1, 'To eat'),
(62, 5, 2, 'To make them die'),
(63, 5, 3, 'I am a leader'),
(64, 5, 4, 'A win'),
(65, 5, 5, 'I make em lose'),
(66, 5, 6, 'Beat em'),
(67, 5, 7, 'Nothing prolly'),
(68, 5, 8, 'Nonthing'),
(69, 5, 9, 'Hold fast, then call in JTF2.');

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `mission_id` int(11) NOT NULL,
  `mission_name` text NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `situation` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `answerkey_loc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`mission_id`, `mission_name`, `type`, `level`, `situation`, `mission`, `details`, `map`, `answerkey_loc`) VALUES
(1, 'Platoon Attack in Jalalabad', 'desert', 'platoon', '<h2>Scenario</h2>\r\n            <p>You are the 2d Platoon Commander, Company F, BLT 2/1, 11th MEU. Your company has recently taken over the area of responsibility (AOR) of Jalalabad, Afghanistan. After initial operations, organized resistance has ceased. However, insurgent and tribal fighters remain as active combatants.</p>\r\n            <p>Your AOR is in an urban environment characterized by densely but haphazardly arranged mud brick houses of one and two stories with flat roofs, with the occasional taller building—usually a mosque or other religiously associated structure.</p>\r\n            <p>The enemy you face wears no standardized military uniform and often appears in civilian dress, uses Soviet-era infantry weapons (AK–47s, light machine guns, and rocket propelled grenades), and has the occasional command of 82mm mortars and 12.7mm machine guns. Their main tactic is the ambush, initiated by RPG attack or improvised explosive device.</p>\r\n            <p>The BLT has been relatively successful in matters of civil affairs and civil-military relations, initiating a \"weapons buy back program.\" Of the seven major clans in the AO, the BLT has secured the support of one smaller clan but still faces resistance from several of the larger clans in the city and surrounding area.</p>', '<h2>Mission</h2>\r\n            <p>Your platoon is on its second patrol. After crossing the Rt 6 bridge, you enter the area controlled by the smaller clan that supports coalition forces. You are moving from south to north, 1st squad on the left flank, you are with 2d Squad in the center, and 3d Squad is on the right.</p>\r\n            <p>Approximately 20 minutes after crossing the bridge, you hear and see an explosion where you expect 1st Squad to be, followed by automatic weapons fire and semi-automatic weapons fire. 2nd Squad leader executes halt in place and 360 security. Firing continues for 30 seconds before you receive 1st Squad report:</p>\r\n            <blockquote class=\"squad-report\">\r\n                \"Enemy squad with AKs, RPG, mortar IED. Watson and Perez are down. Need CASEVAC. Break. Recommend 2nd Squad move north of my position and cut off retreating enemy elements. Over.\"\r\n            </blockquote>\r\n            <p class=\"requirement\"><strong>Requirement:</strong> What now, Lieutenant? In a time limit of 5 minutes, determine what actions you would take, what orders you would issue, and what reports, if any, you would make.</p>', '            <h2>Details</h2>\r\n            <ul class=\"detail-list\">\r\n                <li>Main roads are paved and two lanes wide</li>\r\n                <li>Side roads are paved but only one and a half lanes wide</li>\r\n                <li>Numerous narrow dirt alleyways only suitable for foot traffic</li>\r\n                <li>You have only your organic weapons</li>\r\n                <li>Radio contact with other squads and Battalion COC, though not always 100% due to urban environment</li>\r\n                <li>Enemy rarely stands to fight, even after ambushes</li>\r\n                <li>S-2 believes major engagements often center around religious sites</li>\r\n            </ul>', '/maps/desertplatoon.png', 'answers/answerkey_1.txt');

-- --------------------------------------------------------

--
-- Table structure for table `mission_results`
--

CREATE TABLE `mission_results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mission_id` int(11) DEFAULT NULL,
  `story` text DEFAULT NULL,
  `final_summary` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mission_results`
--

INSERT INTO `mission_results` (`id`, `user_id`, `mission_id`, `story`, `final_summary`, `created_at`) VALUES
(1, 5, 1, '**Mission Report: Operation Perseverance**\n\n**Location:** Jalalabad, Afghanistan  \n**Date:** [Insert Date]  \n**Time of Engagement:** [Insert Time]  \n**Platoon Commander:** [Insert Student&#039;s Name]  \n**Unit:** 2d Platoon, Company F, BLT 2/1, 11th MEU  \n\n---\n\nIn the heart of Jalalabad, the sun receded into darkness, casting long shadows across the crumbling mud-brick structures. The air crackled with tension as 2d Platoon of Company F moved cautiously through the urban landscape, their bodies tense and minds alert following their second patrol across the strategic Rt 6 bridge. Just moments after crossing, the calm shattered with the explosion that sent shockwaves through the ground, smoke billowing into the twilight sky.\n\nTiming was of the essence. As wounds of war cut deep into the fabric of the local populace, trust between the coalition forces and civilians hung in the balance. With the 1st Squad positioned on the left flank taking heavy contact from an insurgent ambush, it was imperative that immediate action be taken to regain the initiative and protect both the Marines and the innocent lives caught in the crossfire.\n\n“2nd Squad, hold your position and establish 360-degree security!” barked Lieutenant [Insert Student&#039;s Name], voice laced with urgency. With this rallying call, they expertly surveyed the threats, keenly aware of the complexities surrounded by tribal dynamics and insurgent strategies. The expectation was clear: “We will not hold back; our responses must be measured—kill or capture.”\n\nAs the gunfire thundered, swirling echoes of the enemy&#039;s automatic weapons filled the air. Communicating swiftly with the 1st Squad Leader, reports streamed in detailing the enemy’s strength, the casualties that had ensued, and the urgent need for CASEVAC. Despite the chaos unfolding, the Lieutenant’s mind remained sharp and focused, striving to synchronize the efforts of the platoon while ensuring the well-being of the team.\n\n“1st Squad, fix the enemy’s position! 2nd Squad, move north to flank and cut off their retreat. 3rd Squad, establish blocking positions along the river!” The Lieutenant projected authority and clarity, navigating the delicate currents of tactical maneuvering. \n\nThe insurgents, likely emboldened by previous successes, had aimed to disrupt the coalition&#039;s momentum with their attack. However, through decisive leadership and a refusal to act impulsively, the platoon maintained their operational integrity. In a combat environment replete with unpredictability, the realignment of forces swiftly countered the enemy&#039;s objectives—their vindication loomed.\n\nWithin 20 minutes, the impact of civilian casualties loomed large. Realizing how the enemy would exploit the situation, the Lieutenant identified crucial layers where intervention could stymie propaganda efforts. “We must secure the scene! Attention to the wounded civilians is paramount. Document everything; these images will form the backbone of our information operations.” He understood the delicate interplay of perception and reality.\n\nRecognizing that successful operations required attributing ally support while simultaneously discrediting enemy narratives, the Lieutenant guided his men. “Care for our wounded and engage with the local populace, assuring them that our intentions are righteous. We are here to protect, not destroy.”\n\nAs chaos erupted, the quick response from the platoon began to materialize. Enemy forces, believing they could achieve tactical advantage through surprise and overwhelming aggression, faced the coordinated might of 2d Platoon. The web of support for local clans had shifted; the coalition’s message began to manifest in concrete actions—rebuilding trust amidst the devastation.\n\nThe skirmish concluded with the insurgents losing their foothold in the area. With effective maneuverability, the platoon achieved its mission objectives while inflicting damage on the enemy, effectively countering their plans و inching closer to restoring peace to Jalalabad.\n\nAs the dust settled and soldiers regrouped, the Lieutenant’s resolve not only fostered trust among his ranks but also broadcasted a clear message: integrity in leadership and compassion towards civilians would always remain pillars of their mission in foreign lands. Together, the platoon proved that even amidst the stark realism of warfare, valor and strategy could ignite hope beneath the rubble.\n\n**End of Mission Report**', '**Mission Summary: Performance Assessment**\n\n**Student:** [Insert Student&#039;s Name]  \n**Date:** [Insert Date]  \n**Course:** Infantry School  \n**Mission:** Operation Perseverance\n\n---\n\n### Performance Assessment\n\n**Overall Analysis:**\nThe responses provided to the scenario-based questions indicate a considerable shortfall in grasping the complexities of military operations and command responsibilities. The student consistently demonstrated a lack of analytical depth, leading to simplistic and inadequate responses that could severely compromise operational effectiveness in a real-world context.\n\n**Key Failures Identified:**\n- **Lack of Understanding of the Enemy:** Throughout the responses, the student failed to articulate an understanding of the enemy&#039;s true intent and strategy, which is essential for effective operational planning.\n- **Inadequate Tactical Responses:** The responses presented reflect a failure to acknowledge the multidimensional aspects of military engagement, including managing troop morale and civilian safety.\n- **Failure to Develop a Strategic Mindset:** Responses such as “Nothing prolly” and “Nonthing” exemplify a lack of critical thinking and decision-making abilities crucial for success in an infantry command role.\n\n### Areas for Improvement:\n1. **Deepen Analysis of Enemy Intent:** Focus on understanding the enemy’s motivations and developing comprehensive strategies to counteract their actions effectively.\n2. **Enhance Tactical Planning Skills:** Work on providing detailed and specific orders that take into account the full spectrum of military leadership responsibilities, including troop welfare and minimization of civilian casualties.\n3. **Foster Critical Thinking:** Engage in exercises that encourage deeper analysis of scenarios. Practice articulating responses that connect specific actions to overarching strategic objectives.\n\n### Strengths to Continue:\n1. **Recognition of the Importance of Communication:** The student demonstrates at times an understanding of the importance of clear communication within the unit. This is critical in maintaining operational effectiveness.\n2. **Commitment to Mission Objectives:** There is evidence of a desire to accomplish the mission within the context of coalition and civil relations, which is commendable.\n3. **Understanding of Civil-Military Relations:** Even in limited scope, the student acknowledges the importance of maintaining civilian trust, indicating a foundational awareness of broader military objectives.\n\n### Final Letter Grade: F\n\nIn conclusion, while the storytelling in the Mission Report was impactful and demonstrated narrative understanding, the lack of analytical depth and critical thinking in the answers to operational questions signifies a need for significant improvement. The Infantry School demands a higher standard of insight and execution. I encourage the student to reflect on this feedback and dedicate themselves to enhancing their understanding of military strategy, leadership, and operational analysis to meet the rigorous demands placed on infantry leaders.', '2024-09-17 23:21:09'),
(2, 5, 1, '### Mission Report: Operation Swift Shield - Failed Engagement in Jalalabad\n\n**Situation Overview:**  \nAfter crossing the Rt 6 bridge into the area controlled by our allied clan, the atmosphere was tense. The engagement came swiftly, with the 1st Squad reporting an enemy ambush utilizing Soviet-era weaponry. Casualties were sustained early, leading to an immediate need for decisive action.\n\n**Objective and Command Intent:**  \nAs the 2d Platoon Commander, my directives were clear: disable and neutralize the insurgent ambush while minimizing collateral damage. Our mission was not simply to engage but to preserve our standing with the civilian population and showcase our commitment to safety and security.\n\n**Initial Contact: Logic and Orders:**  \nUpon receiving the report from 1st Squad, basic decisions should have hinged on a sound groundwork of strategies aimed at local dynamics, awareness of enemy capabilities, and an understanding of the overarching mission goals. In reviewing my orders, operational awareness was expected to flow through all levels of command, ensuring actions taken were coherent with the commanders&#039; intent to reduce civilian casualties.\n\nHowever, in practice: \n\n1. **Underestimated the Enemy:**  \nThe team failed to articulate the true objectives of the ambush. The casual references to the enemy&#039;s intent, such as &quot;to eat&quot; or simply seeking a &quot;win,&quot; reflected a severe underestimation of the insurgents as they sought to inflict damage on our morale and legitimacy.\n\n2. **Commander’s Intent Overlooked:**  \nResponses like “to make them die” lacked the nuanced understanding of our mission. The simplistic approach failed to recognize the operational constraints necessitated by our rules of engagement, which emphasized protecting our troops and mitigating civilian impact.\n\n3. **Inadequate Tactical Awareness:**  \nDiscussions surrounding tactical decisions were insufficient. Phrases such as “I am a leader” did not address the multidimensional nature of the mission. The directives issued failed to provide a detailed understanding of how our actions would affect both tactical outcomes and strategic relationships with the local populace.\n\n4. **Enemy Counters Ignored:**  \nThe enemy’s potential reactions were inadequately explored, reducing the robustness of our overall plan. Responses like “beat em” lacked the analytical depth required to preemptively address enemy maneuvers, risking our positions and undermining our operational success.\n\n5. **Civilians and Damage Management:**  \nResponses to potential civilian casualties, indicating “nothing prolly,” starkly opposed our counter-insurgency objectives. This unacceptable oversight in addressing enemy exploitation of civilian suffering would create long-term repercussions for our efforts in the region.\n\n**Conclusion:**  \nIn the aftermath of the operation, our failure to grasp the complexities of the situation led to mission failure. Our actions resulted in unnecessary casualties and damage to civilian property, undermining our credibility and support in the area. This engagement serves as a stark reminder of the continued necessity for rigorous training, thorough situational analysis, and unwavering commitment to our higher commanding strategy.\n\n**Lessons Learned:**  \n- Understand the enemy’s motives in their operational strategies.\n- Align actions with the comprehensive intent of command while maintaining a focus on avoiding civilian harm.\n- Predict and analyze enemy counters to achieve tactical superiority.\n- Establish concise and coherent orders for subordinates to follow, strengthen command relevance, and ensure operational success.\n\nDespite the failure, it remains paramount that we take these lessons to heart as we prepare for future engagements. Redeeming our efforts requires deeper comprehension, improved analysis, and unwavering adherence to the values we embody in our mission. The Infantry School instills discipline and operational readiness, and while this mission has faltered, dedication to learning and growth will forge stronger leaders for the challenges ahead.', '### Final Summary of Mission Assessment\n\n**Student Performance Overview:**\nThe responses presented during this assessment indicated a stark lack of understanding of essential military concepts, situational analysis, and strategic thinking required at the infantry school level. The candidate fell short in their evaluations across multiple critical areas, including enemy intentions, the comprehensive nature of commander&#039;s intent, the importance of civilian considerations, and the necessity of tactical foresight.\n\nDespite the structure of the questions driving candidates toward deeper thought processes, the student provided simplistic and vague answers. This approach negatively impacts their ability to think critically and act effectively in combat scenarios.\n\n### Areas for Improvement:\n1. **Develop Comprehensive Understanding of Enemy Goals:**\n   - Soldiers must move beyond basic interpretations of enemy objectives. A thorough analysis requires understanding tactical, psychological, and operational aims.\n\n2. **Enhance Tactical and Strategic Analysis:**\n   - The candidate should dedicate time to studying military strategy and operations, which includes recognizing the nuanced intentions behind a commander&#039;s directives and understanding the complexity of mission outcomes.\n\n3. **Emphasize Civil-Military Relations Awareness:**\n   - Significant attention should be given to how military engagements affect civilian populations. The candidate must gain comprehension in counteracting enemy exploitation of these situations through proactive actions.\n\n### Continue Doing:\n1. **Engaging in Self-Reflection:**\n   - Continue to self-reflect on provided answers and how they can be improved for clearer and more effective communication.\n\n2. **Commitment to Learning and Development:**\n   - Maintain a dedication to growth and engagement in military education resources that will enhance knowledge and understanding of operational planning.\n\n3. **Understanding Command Structures:**\n   - Retain the emphasis on understanding hierarchical structures within military contexts as this is foundational to operational success.\n\n### Final Grade:\nGiven the significant shortcomings in critical areas of evaluation and understanding alongside the lack of engagement with necessary military concepts, I would assign this candidate a letter grade of **F** (Fail). To advance within the Infantry School and become effective leaders, it is imperative that comprehensive effort is made towards addressing these areas of concern. There is potential for growth, but immediate corrective actions must be implemented.', '2024-09-17 23:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mission_id` int(11) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `mission_id`, `note`) VALUES
(8, 1, 1, 'X.'),
(9, 1, 1, 'A'),
(10, 1, 1, 'a'),
(11, 3, 1, 'I took notes about: enemy.'),
(12, 5, 1, 'a'),
(18, 5, 1, 'Ranger '),
(19, 5, 1, 'a'),
(20, 5, 1, 'k0'),
(21, 5, 1, 'rinho'),
(22, 5, 1, 'ftktfk');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `mission_id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `mission_id`, `question`) VALUES
(1, 1, 'What is the enemy goal?'),
(2, 1, 'What do you believe your company and battalion commander’s intents are?'),
(3, 1, 'In this scenario, how do your actions and orders relate to their intents?'),
(4, 1, '. What does the enemy hope to gain from this attack?'),
(5, 1, '. How do your actions deprive the enemy of those gains?'),
(6, 1, '. How will the enemy counter your platoon’s actions?'),
(7, 1, '. Assume that as a result of this incident, two civilians are wounded and one home is damaged. How will the \r\nenemy exploit this?\r\n• In 20 minutes? \r\n• By the end of the day?\r\n• The rest of the week'),
(8, 1, 'What can you do to counter his effects at exploitation?\r\n• Now?\r\n• After you return to base?'),
(9, 1, '. Write what orders you would issue, and what reports, if any, you would make.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `codename` varchar(50) NOT NULL,
  `codeword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `codename`, `codeword`) VALUES
(1, 'Squire', 'Sheol'),
(2, 'Stay', 'red'),
(3, 'E', 'blue'),
(4, 'Dango', ''),
(5, 'Ranger', 'red'),
(6, '1', 'red'),
(7, 'Badge', 'red'),
(8, 'Madge', 'yellow'),
(9, 'Lynch', 'green');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`mission_id`);

--
-- Indexes for table `mission_results`
--
ALTER TABLE `mission_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mission_id` (`mission_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mission_id` (`mission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `mission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mission_results`
--
ALTER TABLE `mission_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`mission_id`) REFERENCES `mission_briefs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
