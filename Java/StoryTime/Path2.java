package StoryTime;

import java.util.ArrayList;
import java.util.Random;
import java.util.Scanner;

public class Path2 {
	static Scanner input = new Scanner(System.in);
	static String end;

	public static String Story() {

		// Path two introduction
		System.out.print("\nYou take the second turning off the roundabout, you begin seeing a lot of people walking down the paths.");
		input.nextLine();
		System.out.print("\nThere are plenty of people out today, on their bikes and playing in parks.");
		input.nextLine();
		System.out.print("\nAs you stop at the car park, the ice cream van pulls up,"
				+ " and because it is such a hot day, you decide to have an ice cream.");
		input.nextLine();
		System.out.print("\nThe ice cream man got his menu stolen recently and refuses to list all of the ice creams he has availiable.");
		input.nextLine();
		
		getRandomIceCream(); // Calls method for a random ice cream
		String randomIceCream = getRandomIceCream(); // Sets the random ice cream from the method to the string 'randomIceCream'
		System.out.print("\nYou ask the ice cream man for a random ice cream and recieve a " + randomIceCream
				+ " ice cream for \u00A31.50.");
		input.nextLine();
		System.out.print("\nThe " + randomIceCream + " ice cream begins to melt rapidly, it must be the hottest day of the year!");
		input.nextLine();
		System.out.print("\nAs you sit on the nearby bench,"
				+ " you see a child has just dropped their ice cream on the floor, and they burst into tears.");
		input.nextLine();
		
		int giftChild = 1 + (int) (Math.random() * ((3 - 1) + 1)); // Random number generator to decide what happens next in the story
		
		// Calls for the method, passes the randomly generated number and the random ice cream through to the method
		giftChildEvent(giftChild, randomIceCream);
		System.out.print("\nAfter all that is over, you decide to have a walk down near the lake");
		input.nextLine();
		System.out.print("\nYou see a family of ducks swimming, and two swans side by side");
		input.nextLine();
		System.out.print("\nSuddenly you hear a loud scream, and see a child has fallen into the lake!");
		input.nextLine();
		System.out.print("\nIt is the child from earlier with the ice cream, and they are struggling to stay afloat!");
		input.nextLine();
		System.out.print("\nEnter 1 to dive in and save them, 2 to call for help from another bystander,"
				+ " or 3 to keep on walking and act as if nothing happened: ");
		int saveChild = input.nextInt();
		input.nextLine();
		
		// Calls for the method, passes the saveChild choice through to the method
		saveChildEvent(saveChild);
		if (saveChild == 3) { // If saveChild equals 3, return end
			return end;
		}
		System.out.print("\nEveryone starts cheering that the child has been saved, all thanks to your help.");
		input.nextLine();
		System.out.print("\nThe Mayor of the town watched your heroic actions and wants to reward you for your quick thinking.");
		input.nextLine();
		
		getRandomReward(); // Calls method for a random reward
		String randomReward = getRandomReward(); // Sets the random reward from the method to the string 'randomReward'
		System.out.print("\nThe Mayor of the town proudly rewards you with a " + randomReward 
				+ ", which you gladly take, happy that you reacted quickly to saving the child.");
		input.nextLine();
		System.out.print("\nYou decide that it is time to head home, so you start heading from the lake,"
				+ " thanking everyone who had been prasing you.");
		input.nextLine();
		System.out.print("\nYou have no idea where you parked your car, and do not know this town at all.");
		input.nextLine();
		System.out.print("\nEnter 1 to continue to search for your car, 2 to call for a taxi, or 3 to ask the Mayor for a helicopter ride: ");
		int travelOption = input.nextInt();
		input.nextLine();
		
		// Calls for the method, passes the travelOption and the random reward through to the method
		travelEvent(travelOption, randomReward);
		return end;
	}

	private static void giftChildEvent(int giftChild, String randomIceCream) {
		if (giftChild == 1) { // If randomNumber = 1
			System.out.print("\nYou run over to the child and give them your " + randomIceCream
					+ " ice cream, their Mum thanks you as the ice cream man had just driven off.");
			input.nextLine();
		} else if (giftChild == 2) { // If randomNumber = 2
			System.out.print("\nYou point and laugh at the child, exaggerating that you have a nice " + randomIceCream
					+ " ice cream, and theirs is on the floor all melted. \nYou finish your ice cream just before it melts.");
			input.nextLine();
		} else if (giftChild == 3) { // If randomNumber = 3
			System.out.print("\nYou manage to wave the ice cream man down and buy a new ice cream for the child,"
					+ " they thank you as their old ice cream is being picked at by seagulls.");
			input.nextLine();
		}
	}
	
	private static void saveChildEvent(int saveChild) {
		if (saveChild == 1) { // If saveChild = 1
			System.out.print("\nYou dive in and grab the child, bringing them back to the footpath that they fell from."
					+ "\nTheir Mum thanks you for saving them, whilst still in shock.");
			input.nextLine();
		} else if (saveChild == 2) { // If saveChild = 2
			System.out.print("\nYou start running to grab the attention of the bystander, fortunately they are confident at swimming."
							+ "\nThey jump in to save the child, bringing the child back to the footpath that they fell from.");
			input.nextLine();
			System.out.print("\nThe child's Mum thanks the both of you for saving her child.");
			input.nextLine();
		} else if (saveChild == 3) { // If saveChild = 3
			System.out.print("\nYou decide not to help the child, and continue walking."
					+ "\nA bystander pushes you out the way and dives in, saving the child.");
			input.nextLine();
			System.out.print("\nThe bystander gets out of the lake, and hits you over the head with a rock,"
					+ " enraged that you did not try to help the child!");
			input.nextLine();
			storyTime.hospitalEnding(); // Calls hospitalEnding method from main class
		}
	}
	
	private static void travelEvent(int travelOption, String randomReward) {
		if (travelOption == 1) { // If travelOption = 1
			System.out.print("\nYou continue searching for your car, but it is beginning to go dark outside.");
			input.nextLine();
			System.out.print("\nAfter two hours, now pitch black, you find your car where you parked it before the ice cream.");
			input.nextLine();
			System.out.print("\nYou will collect the " + randomReward + " when you next visit this town again.");
			input.nextLine();
			storyTime.carEnding(); // Calls carEnding method from main class
		} else if (travelOption == 2) { // If travelOption = 2
			System.out.print("\nYou decide to call for a taxi on your phone, asking him to pick you up near the big lake.");
			input.nextLine();
			System.out.print("\nAfter a couple of minutes, the taxi turns up.");
			input.nextLine();
			storyTime.taxiEnding(); // Calls taxiEnding method from main class
		} else if (travelOption == 3) { // If travelOption = 3
			System.out.print("\nYou run back to the Mayor and ask him if you can have a ride in his helicopter to get back home in exchange for the "
							+ randomReward + " that he gifted you earlier.");
			input.nextLine();
			System.out.print("\nThe Mayor agrees, but allows you to keep the " + randomReward + " because he thinks you are a nice person.");
			input.nextLine();
			storyTime.helicopterEnding(); // Calls helicopterEnding method from main class
		}
	}

	private static String getRandomIceCream() {
		ArrayList<String> iceCream = new ArrayList<String>();

		// List of ice creams that could be given at random
		iceCream.add("Cornetto");
		iceCream.add("Fab");
		iceCream.add("Magnum");
		iceCream.add("Screwball");
		iceCream.add("Sundae");
		iceCream.add("Ben & Jerrys");
		iceCream.add("Frozen Yogurt");

		// Get random ice cream from Arraylist using Random().nextInt()
		String randomIceCream = iceCream.get(new Random().nextInt(iceCream.size()));
		return randomIceCream;
	}
	
	private static String getRandomReward() {
		ArrayList<String> reward = new ArrayList<String>();

		// List of rewards that could be given at random
		reward.add("lifetime supply of McDonalds");
		reward.add("key to the city");
		reward.add("million pounds");
		reward.add("new ice cream van");
		reward.add("free ice cream");
		reward.add("packet of sweets");
		reward.add("ticket for one free trip to Alton Towers");

		// Get random ice cream from Arraylist using Random().nextInt()
		String randomReward = reward.get(new Random().nextInt(reward.size()));
		return randomReward;
	}
}