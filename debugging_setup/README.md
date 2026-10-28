# WEB-250 — Debugging Setup

**This README is your graded debugging notebook.** Complete the TODOs below with your **own** observations after using VS Code + Xdebug. Do not paste `phpinfo()` output or anything confidential.

## Local setup

- Operating system and local server (Mac/MAMP or Windows/XAMPP): macOS — MAMP
- PHP version shown in the **browser's phpinfo**: 8.3.14
- Xdebug version: 3.3.2
- Active `php.ini` path (no secrets): 	/Applications/MAMP/bin/php/php8.3.14/conf/php.ini
- Xdebug / VS Code port (recommended 9003): 9003
- Local Apache port (our class uses 55000): 8888
- Mac/MAMP FastCGI `-idle-timeout 600` configured? (Windows: N/A): 600 seconds
- Mac/MAMP 45-second breakpoint pause, Step Over, Continue test result (Windows: N/A): Passed
- Local exercise index URL: (http://localhost:8888/web250/debugging_setup/index.php)
- Hosted exercise index URL: TODO

## Exercise 01 — Variables and Watch

- Prediction for `$observations` before the `+=` line: I predict that `$observations` will start at 3 and increase to 5 after the step-over
- Value before Step Over: 3
- Value after Step Over: 5
- What you learned about the breakpoint and Watch: The watch let me see the updated value in real time as I stepped over. 
- Screenshot: `evidence/01_variables.png` — Shows the debugger paused with the Variables and Watch panels displaying the value of $observations.

## Exercise 02 — Loop and conditional breakpoint

- Predicted total and average: I predict that the total will be 10 and average will be 2.50
- `$total` after the first two iterations: After the 1st iteration, it was two. After the 2nd, it was 6.
- Values seen when `$dayIndex === 2` (index, count, total): $dayIndex was 2, $count was 1, and $total was 6.
- Why the conditional breakpoint helped: The conditional breakpoint allowed me to pause the program only when $dayIndex was 2 instead of stopping at every iteration. 
- Screenshot: `evidence/02_conditional.png` — Shows the debugger paused at the conditional breakpoint on line 12. 

## Exercise 03 — Step Into / Step Out / Call Stack

- Predicted output: Eastern Towhee: 2 sightings
- Which function called `formatObservation()`?: The describeBird() function called formatObservation()
- What Step Into showed that Step Over would skip: Step Over would have executed the function without showing what happened in it 
- Where Step Out returned you: The first Step Out returned me to describeBird(), and the second returned me to the main PHP script.
- Screenshot: `evidence/03_call_stack.png` — Shows the debugger paused inside formatObservation() with the Call Stack displaying formatObservation(), describeBird(), and the main script.

## Exercise 04 — Find and fix the bug

- Original incorrect browser output: Birds counted: 4
- Values you observed while stepping through the loop: The total started at 0. During the first iteration, it changed to 2, then to 3 during the second iteration, and finally to 4 during the third iteration.
- Original error and minimal correction (in your words): The original error was replacing $total instead of adding to it. I changed $total = $count to $total += $count.
- Corrected output: Birds counted = 9
- Why PHP did not raise an exception: Problem was with logic not syntax
- Screenshot: `evidence/04_fixed_bug.png` — Shows the debugger paused at the corrected statement with $count equal to 4 and $total equal to 5 in the Variables and Watch panels.

## How to view this project

- Local: Open `web250/debugging_setup/index.php` through your MAMP/XAMPP browser URL.
- Webhost: Open the course index and follow the Debugging Setup link.
- GitHub: Link to this folder on `main` in the Moodle Comments area.

**Safety reminder:** Never commit or deploy `php.ini`, `_local_phpinfo.php`, credentials, or logs. The project-level `.vscode/launch.json`, this README, and evidence screenshots belong on **GitHub** but **not** on the public webhost. Never activate Xdebug on your public webhost.
