package StoryTime;

import java.util.ArrayList;
import java.util.Random;
import java.util.Scanner;

public class Path3 {
	static Scanner input = new Scanner(System.in);
	static String end, chosenFood = "";
	static final double ticketPrice = 32.25;

	public static String Story() {

		// Path three introduction
		System.out.print("\nYou take the third turning off the roundabout, and begin going up and down hills in the countryside.");
		input.nextLine();
		System.out.print("\nThis place is familiar, you feel as if you have driven on this road before.");
		input.nextLine();
		System.out.print("\nRoadside signs are directing you towards Alton, which you know is where Alton Towers is.");
		input.nextLine();
		System.out.print("\nYou see the large welcome sign of Alton Towers, open from 10am till 11pm today, a great full-day out!");
		input.nextLine();
		System.out.print("\nOnce at the main gates, you wonder how much a ticket to enter the theme park will cost you.");
		input.nextLine();
		System.out.print("\nThe lady in the booth tells you that a ticket will cost you \u00A3" + ticketPrice + " for an adult ticket.");
		input.nextLine();
		System.out.print("\nSince it is a spontaneous day out, you are not too sure whether to go in or save your money.");
		input.nextLine();
		
		System.out.print("\nEnter 1 if you want to pay the ticket price and enter Alton Towers, or 2 if you wish to just go back home: ");
		int enterParkChoice = input.nextInt();
		input.nextLine();
		
		// Calls for the method, passes the enterParkChoice through to the method
		enterParkEvent(enterParkChoice);
		if (enterParkChoice == 2) { // If enterParkChoice equals 2, return end
			return end;
		}
		System.out.print("\nOnce in the park, you are handed a park map by one of the members of staff, who is overly excited to see you.");
		input.nextLine();
		System.out.print("\nCompletely lost on what ride to go on, you close your eyes and point randomly on the map. "
				+ "\nWhichever ride your finger lands on will be the ride you go on first.");
		input.nextLine();
		getRandomRide(); // Calls method for a random ride
		String randomRide = getRandomRide(); // Sets the random ride from the method to the string 'randomRide'
		System.out.print("\nWhen you open your eyes, you find your finger has landed on " + randomRide + ", which you cannot wait to get on.");
		input.nextLine();
		System.out.print("\nIt is your first time ever going on " + randomRide + ", and really do not know what to expect.");
		input.nextLine();
		System.out.print("\nOnce on " + randomRide + ", you hear someone beginning to scream, and you look up to see what she is screaming about!");
		input.nextLine();
		int randomRideEvent = 1 + (int) (Math.random() * ((5 - 1) + 1)); // Random number generator to decide what happens next in the story
		
		// Calls for the method, passes the randomly generated number through to the method
		rideEvent(randomRideEvent);
		if (randomRideEvent == 4 || randomRideEvent == 5) { // If randomRideEvent equals 4 || 5, return end
			return end;
		}
		System.out.print("\nOne you get off of " + randomRide + ", you go on a few more rides.");
		input.nextLine();
		System.out.print("\nYou are really hungry, and decide to get something from the shop near the exit of Alton Towers.");
		input.nextLine();
		System.out.print("\nThere is plenty of selection, but you decide to go for one of the main foods at the shop.");
		input.nextLine();
		System.out.print("\nEnter 1 for a hot dog, 2 for a cheeseburger, 3 for a pizza, or 4 for a pack of doughnuts: ");
		int shopFoodChoice = input.nextInt();
		input.nextLine();
		shopFoodEvent(shopFoodChoice);
		String shopFood = chosenFood;
		System.out.print("\nYou have chosen the " + shopFood + ", nice choice!");
		input.nextLine();
		System.out.print("\nAfter several hours at Alton Towers, you decide that it is time to go home.");		
		input.nextLine();
		int randomTravelHome = 1 + (int) (Math.random() * ((3 - 1) + 1)); // Random number generator to decide what happens next in the story
		
		// Calls for the method, passes the randomly generated number through to the method
		travelHomeEvent(randomTravelHome);
		return end;
	}
	
	private static void enterParkEvent(int enterParkChoice) {
		if (enterParkChoice == 1) { // If enterParkChoice = 1
			System.out.print("\nYou decide that \u00A3" + ticketPrice + " is a small price to pay for a full-day out,"
					+ " so you hand the money over to the lady in the booth. \nShe snatches the money off of you, a bit rude!");
			input.nextLine();
		} else { // If enterParkChoice = 2
			System.out.print("\nYou decide not to pay that price as it is too expensive for what it is worth,"
					+ " and begin to walk back to your car, which is a 15 minute walk away.");
			input.nextLine();
			System.out.print("\nArriving back at your car, you wonder if it was the right choice in not going into the theme park.");
			input.nextLine();
			storyTime.carEnding(); // Calls carEnding method from main class
		}
	}
	
	private static void rideEvent(int randomRideEvent) {
		switch (randomRideEvent) {
		case 1: // If random number = 1
			System.out.print("\nThe track is on fire, and the ride train is going very fast towards the fire!");
			input.nextLine();
			System.out.print("\nSuddenly the ride train starts to slow down, the ride operator quickly reacts and puts the brakes on.");
			input.nextLine();
			System.out.print("\nFire fighters are on the scene instantly, and the ride train is evacuated, you get off the ride feeling lucky to be alive!");
			input.nextLine();
			break;

		case 2: // If random number = 2
			System.out.print("\nThere is a child near the track, they climbed over the fence whilst their Dad was looking the other way!");
			input.nextLine();
			System.out.print("\nOne of the bystanders quickly grabs the child and brings them back over the fence to safety.");
			input.nextLine();
			System.out.print("\nThat was a close one, you are really glad that it did not end the way it was originally looking!");
			input.nextLine();
			break;

		case 3: // If random number = 3
			System.out.print("\nThere is nothing wrong, the fellow passenger was just screaming a little too loud because of how scary the ride is.");
			input.nextLine();
			System.out.print("\nYou really thought that there was something dangerous ahead, lucky there was not anything to worry about!");
			input.nextLine();
			break;
			
		case 4: // If random number = 4
			System.out.print("\nThe ride is shaking very fast, and you see one of the wheels fly off the ride train, just missing a bystander!");
			input.nextLine();
			System.out.print("\nEveryone onboard is fearing for their life, as the ride train surely cannot function with a missing wheel!");
			input.nextLine();
			System.out.print("\nThe ride train tips to one side, and the whole train comes crashing down...");
			input.nextLine();
			storyTime.hospitalEnding(); // Calls hospitalEnding method from main class
			break;
			
		case 5: // If random number = 5
			System.out.print("\nLooking ahead at the track, you notice that there is a piece of the track missing!");
			input.nextLine();
			System.out.print("\nIt had fallen off just after you left the ride station, and now you are getting very close to the missing part of the track!");
			input.nextLine();
			System.out.print("\nThe ride train derails, and the whole train comes crashing down...");
			input.nextLine();
			storyTime.hospitalEnding(); // Calls hospitalEnding method from main class
			break;
		}
	}
	
	private static String shopFoodEvent(int shopFoodChoice) {
		boolean correctAns = false;
		do { // Loops until the user input matches the requirements.
			switch (shopFoodChoice) {
			case 1: // If shopFoodChoice = 1
				chosenFood = "hot dog";
				correctAns = true;
				break;

			case 2: // If shopFoodChoice = 2
				chosenFood = "cheeseburger";
				correctAns = true;
				break;

			case 3: // If shopFoodChoice = 3
				chosenFood = "pizza";
				correctAns = true;
				break;

			case 4: // If shopFoodChoice = 4
				chosenFood = "doughnuts";
				correctAns = true;
				break;

			default: // If shopFoodChoice != 1 || 2 || 3 || 4
				System.out.print("Error incorrect input, please enter 1, 2, 3, or 4: ");
				shopFoodChoice = input.nextInt();
				input.nextLine();
				break;
			}
		} while (correctAns == false);
		return chosenFood; // Returns the updated chosen food, based on the users choice
	}
	
	private static void travelHomeEvent(int randomTravelHome) {
		switch (randomTravelHome) {
		case 1: // If randomTravelHome = 1
			System.out.print("\nYou struggle to find you car within the busy carpark, but remember you parked in area B.");
			input.nextLine();
			System.out.print("\nYou get your parking ticket ready to show the parking wardens at the exit.");
			input.nextLine();
			storyTime.carEnding(); // Calls carEnding method from main class
			break;

		case 2: // If randomTravelHome = 2
			System.out.print("\nYou cannot find your car in this busy carpark, and cannot remember which area you parked in!");
			input.nextLine();
			System.out.print("\nWith no patience at all, you decide to call for a helicopter to pick you up.");
			input.nextLine();
			System.out.print("\nThe helicopter lands in the car park, making the trees swing back and forth.");
			input.nextLine();
			storyTime.helicopterEnding(); // Calls helicopterEnding method from main class
			break;

		case 3: // If randomTravelHome = 3
			System.out.print("\nYou cannot be bothered searching for your car in the car park, and so you ring a taxi to take you home.");
			input.nextLine();
			System.out.print("\nThe taxi pulls up, but you want to take a detour to a nearby town that you do not know the name of.");
			input.nextLine();
			System.out.print("\nThe taxi lets you out, and you search around the town for hours looking for a hotel.");
			input.nextLine();
			storyTime.benchEnding(); // Calls benchEnding method from main class
			break;			
		}
	}
	
	private static String getRandomRide() {
		ArrayList<String> ride = new ArrayList<String>();
		
		// List of rides that could be given at random
		ride.add("Oblivion");
		ride.add("Smiler");
		ride.add("Rita");
		ride.add("Air");
		ride.add("Nemesis");
		ride.add("Wickerman");
		ride.add("Thirteen");

		// Get Random Ride from Arraylist using Random().nextInt()
		String randomRide = ride.get(new Random().nextInt(ride.size()));
		return randomRide;
	}
}
