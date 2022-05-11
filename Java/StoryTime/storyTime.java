package StoryTime;

import java.util.Scanner;

public class storyTime {
	static Scanner input = new Scanner(System.in);
	static boolean continueStoryTime = true, end;

	public static void main(String[] args) {
		int pathChoice = 0;
		while (continueStoryTime) {
			System.out.print("\nIt is story time, to continue through the story, simpily press enter after each line."); // Introduction.
			input.nextLine();
			System.out.print("\nYou're driving down the motorway in your new car and it is the summer.");
			input.nextLine();
			System.out.print("\nYou come up to a roundabout, but there are no signs telling you where the roads lead to.");
			input.nextLine();
			System.out.print("\nWhich turning do you take? Enter 1, 2, 3 or 4: ");
			pathChoice = input.nextInt();
			input.nextLine();

				switch (pathChoice) {
				case 1: // If pathchoice = 1
					Path1.Story(); // Calls for the Path1 class
					break;

				case 2: // If pathchoice = 2
					Path2.Story(); // Calls for the Path2 class
					break;

				case 3: // If pathchoice = 3
					Path3.Story(); // Calls for the Path3 class
					break;

				case 4: // If pathchoice = 4
					Path4.Story(); // Calls for the Path4 class
					break;

				default: // If pathchoice != 1, 2, 3 or 4
					System.out.print("\nPlease only enter 1, 2, 3 or 4 : ");
					pathChoice = input.nextInt();
					break;
				}
			}
		}


	public static void hospitalEnding() { // If hospitalEnding is called within a path
		System.out.print("\nYou awake in a hospital, how did you get here? What were you even doing?");
		input.nextLine();
		System.out.print("\nAll you can remember is arriving at a roundabout, but you cannot remember which road you took.");
		input.nextLine();
		end();
	}

	public static void taxiEnding() { // If taxiEnding is called within a path
		System.out.print("\nYou hop into the back of the taxi and ask the driver to take you back to your home in Rhyl.");
		input.nextLine();
		System.out.print("\nThe taxi driver laughs, and says that the fare is going to be way over £150 as you are three hours away from home.");
		input.nextLine();
		System.out.print("\nWith a suprised look on your face, you agree and the taxi driver takes you home.");
		input.nextLine();
		System.out.print("\nHours pass and you are finally home, you get in, feed the dog, and put the kettle on.");
		input.nextLine();
		end();
	}

	public static void benchEnding() { // If benchEnding is called within a path
		System.out.print("\nYou have had enough for one day, the events leading up to this moment have worn you out.");
		input.nextLine();
		System.out.print("\nFinding a nice bench, you sit down deciding that you are not going to move until someone can help you to get home.");
		input.nextLine();
		System.out.print("\nThe problem with that plan is that everyone speaks Welsh and not a word of English in this town.");
		input.nextLine();
		System.out.print("\nYou remain in this town for the rest of your life, as nobody can assist you.");
		input.nextLine();
		end();
	}
	
	public static void helicopterEnding() { // If helicopterEnding is called within a path
		System.out.print("\nYou hop into the helicopter, and the pilot asks where to fly to.");
		input.nextLine();
		System.out.print("\nTelling them to take you to Rhyl, they manage to fly there in just 20 minutes!");
		input.nextLine();
		System.out.print("\nThe pilot hands you a parachute and tells you to jump.");
		input.nextLine();
		System.out.print("\nScared for your life, you jump out of the helicopter, pulling the parachute and safely landing in your garden.");
		input.nextLine();
		System.out.print("\nYou tell your neighbour the kind of day you have had, and how tired you are.");
		input.nextLine();
		end();
	}
	
	public static void carEnding() { // If carEnding is called within a path
		System.out.print("\nYou hop back into your car and leave to go home.");
		input.nextLine();
		System.out.print("\nOn the way back you stop for a McDonalds as you are feeling quite hungry.");
		input.nextLine();
		System.out.print("\nThe drive through queue is huge, but it is pouring with rain outside, so you decide to wait in the queue.");
		input.nextLine();
		System.out.print("\nYou eat your McDonalds and drive back home.");
		input.nextLine();
		System.out.print("\nJust as you arrive home, the rain stops, and you go inside to watch a film on Netflix.");
		input.nextLine();
		end();
	}

	public static void end() { // When end method is called through one of the ending methods in each path
		String newStoryAns = "";
		System.out.print("\nThis is the end of your story.");
		input.nextLine();
		System.out.print("\nDo you wish to restart story time, or exit story time? \nPlease enter R to restart, or E to exit: ");
		newStoryAns = input.nextLine();
		boolean ans = false;
		do { // Loops until the user input matches the requirements.
			switch (newStoryAns.toLowerCase()) {
			case "r": // Program re-loops so that a new story can begin.
				System.out.println("\nYou have chosen to start a new story.");
				ans = true;
				continueStoryTime = true;
				System.out.println("\n================================================================================================");
				System.out.println("\nGetting ready for another story!");
				System.out.println("\n================================================================================================");
				break;

			case "e": // Program exits.
				ans = true;
				System.out.println("\nThank you for joining this story time!");
				continueStoryTime = false;				
				break;

			default: // User does not input 'R' or 'E'.
				System.out.print("Error incorrect input, please enter R to restart or E to exit: ");
				newStoryAns = input.nextLine();
				break;
			}
		} while (ans == false);
	}
}