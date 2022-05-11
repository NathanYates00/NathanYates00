package StoryTime;

import java.util.ArrayList;
import java.util.Random;
import java.util.Scanner;

public class Path4 {

	static Scanner input = new Scanner(System.in);
	static String end;

	public static String Story() {

		// Path four introduction
		System.out.print("\nYou take the fourth turning off the roundabout, and end up going into a city that you have never been to.");
		input.nextLine();
		System.out.print("\nNeeding to refuel your car, you first need to get some cash out of the bank because the petrol station does not accept card payments.");
		input.nextLine();
		System.out.print("\nThe bank is only open for 10 more minutes, and so the queue inside the bank is quite big.");
		input.nextLine();
		System.out.print("\nInstead of waiting in the queue, you decide to get it out of the cash machine inside the bank.");
		input.nextLine();
		System.out.print("\nThe cash machine is broken, and gives the users random notes.");
		input.nextLine();
		
		getRandomNote(); // Calls method for a random note
		String givenNote = getRandomNote(); // Sets the random note from the method to the string 'givenNote'
		System.out.print("\nYou insert your card, enter your pin, and the card machine gives you a \u00A3" + givenNote + " note.");
		input.nextLine();
		System.out.print("\nYou take your \u00A3"+ givenNote + " note and your card, but as you turn around you get a big suprise!");
		input.nextLine();
		
		getRandomRobber(); // Calls method for a random robber
		String robber = getRandomRobber(); // Sets the random robber from the method to the string 'robber'
		System.out.print("\nThere is a "+ robber + " stood right in front of you, with a baseball bat!");
		input.nextLine();
		System.out.print("\nThe "+ robber + " demands that you hand over your \u00A3"+ givenNote + " note or you will be seriously hurt.");
		input.nextLine();
		System.out.print("\nEnter 1 to you hand over your \u00A3" + givenNote + " note to the " + robber
				+ ", 2 to punch the " + robber + " in the face and run, or 3 to pretend you did not hear him: ");
		int robberyChoice = input.nextInt();
		input.nextLine();
		
		// Calls for the method, passes the robberyChoice, random robber and note through to the method
		robberyEvent(robberyChoice, robber, givenNote);
		if (robberyChoice != 1) { // If robberChoice is not 1, return end
			return end;
		}
		
		System.out.print("\nThe " + robber + " moves onto another person to rob, and begins adding to their bag of money.");
		input.nextLine();
		System.out.print("\nAs their bag of money becomes full, two police officers rush into the bank, grabbing the " + robber + "!");
		input.nextLine();
		System.out.print("\nThe bag of money falls to the ground, and a \u00A3" + givenNote + " slips out of the bag in front of you.");
		input.nextLine();
		
		int grabMoney = 1 + (int) (Math.random() * ((3 - 1) + 1)); // Random number generator to decide what happens next in the story
		
		// Calls for the method, passes the randomly generated number and the random note through to the method
		grabMoneyEvent(grabMoney, givenNote); 
		return end; 
	}
	
	private static void robberyEvent(int robberyChoice, String robber, String givenNote) {
		if (robberyChoice == 1) { // If robberyChoice = 1
			System.out.print("\nYou hand over your \u00A3" + givenNote + " note to the " + robber + ".");
			input.nextLine();
			System.out.print("\nThen they grab and throw you to the floor, before continuing to rob others.");
			input.nextLine();
		} else if (robberyChoice == 2) { // If robberyChoice = 2
			System.out.print("\nYou punch the " + robber + " in the face, and then begin to run.");
			input.nextLine();
			System.out.print("\nThe other robber hits you over the head with the baseball bat, knocking you out instantly...");
			input.nextLine();
			storyTime.hospitalEnding(); // Calls hospitalEnding method from main class
		} else if (robberyChoice == 3) { // If robberyChoice = 3
			System.out.print("\nPretending to not hear the " + robber + ", they stand there staring at you for a full minute.");
			input.nextLine();
			System.out.print("\nA minute passes and they become very scared of you, "
					+ "dropping their baseball bat and running out of the bank as quick as they can.");
			input.nextLine();
			System.out.print("\nThe other people in the bank start cheering that you have saved them, and all give you \u00A3"
							+ givenNote + " each, which is definitely enough to pay for the petrol for your car.");
			input.nextLine();
			System.out.print("\nYou head out of the bank and refill your car with the money that the people from the bank gave you.");
			input.nextLine();
			storyTime.carEnding(); // Calls carEnding method from main class
		}
	}
	
	private static void grabMoneyEvent(int grabMoney, String givenNote) {
		switch (grabMoney) {
		case 1: // If grabMoney = 1
			System.out.print("\nYou grab the money and put it in your pocket, that money must have been your \u00A3" + givenNote + " from earlier.");
			input.nextLine();
			System.out.print("\nThe police escort you out, and you return back to your car.");
			input.nextLine();
			System.out.print("\nYou refill your car, using the money that you picked up from the bank.");
			input.nextLine();
			storyTime.carEnding(); // Calls carEnding method from main class
			break;

		case 2: // If grabMoney = 2
			System.out.print("\nYou grab the money lying on the floor, but the police see you do this!");
			input.nextLine();
			System.out.print("\nThey confiscate the money and take you to the police station for questioning.");
			input.nextLine();
			System.out.print("\nYou have to pay a \u00A3100 fine and force you to get a taxi home.");
			input.nextLine();
			storyTime.taxiEnding(); // Calls taxiEnding method from main class
			break;

		case 3: // If grabMoney = 3
			System.out.print("\nYou leave the money on the floor as it is not yours to take.");
			input.nextLine();
			System.out.print("\nThe police officer picks up the money, and takes all everybody outside.");
			input.nextLine();
			System.out.print("\nA helicopter is waiting on the road, and the police allow you to get in to be taken back home.");
			input.nextLine();
			storyTime.helicopterEnding(); // Calls helicopterEnding method from main class
			break;			
		}
	}
	
	private static String getRandomNote() {
		ArrayList<String> bankNote = new ArrayList<String>();

		// List of bank notes that could be given at random
		bankNote.add("5");
		bankNote.add("10");
		bankNote.add("20");
		bankNote.add("50");

		// Get Random Bank Note from Arraylist using Random().nextInt()
		String randomNote = bankNote.get(new Random().nextInt(bankNote.size()));
		return randomNote;
	}
	
	private static String getRandomRobber() {
		ArrayList<String> robber = new ArrayList<String>();

		// List of robbers that could be given at random
		robber.add("man in pyjamas");
		robber.add("woman with a fake mustache");
		robber.add("rogue banker");
		robber.add("homeless man");
		robber.add("McDonalds clown");
		robber.add("person dressed in all black with a balaclava");

		// Get Random Robber from Arraylist using Random().nextInt()
		String randomRobber = robber.get(new Random().nextInt(robber.size()));
		return randomRobber;
	}
}
