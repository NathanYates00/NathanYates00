package StoryTime;

import java.util.ArrayList;
import java.util.Random;
import java.util.Scanner;

public class Path1 {
	static Scanner input = new Scanner(System.in);
	static String end;
	
	public static String Story() {
		
		// Path one introduction
		System.out.print("\nYou take the first turning off the roundabout, and start going down a long road.");
		input.nextLine();
		System.out.print("\nIt takes you deep into a dark forest, where the sun gets blocked out by the tall trees.");
		input.nextLine();
		System.out.print("\nThe road turns into a dirt path, and you're presented with a derelict house standing alone.");
		input.nextLine();
		System.out.print("\nYou stop and knock on the door to ask for directions, and the door opens without anyone to greet you.");
		input.nextLine();
		
		getRandomItem(); // Calls method for a random item
		String randomItem = getRandomItem(); // Sets the random item from the method to the string 'randomItem'
		System.out.print("\nThere is a chest in the middle of the room, you walk towards it and it flies open, you find a "
						+ randomItem + " inside the chest.");
		input.nextLine();
		System.out.print("\nYou take the " + randomItem + " and go out of the house.");
		input.nextLine();
		System.out.print("\nAs you step out the house, you see someone trying to steal your new car!");
		input.nextLine();
		int leaveCar = 1 + (int) (Math.random() * ((3 - 1) + 1)); // Random number generator to decide what happens next in the story
		
		// Calls for the method, passes the randomly generated number and the random item through to the method
		leaveCarChoice(leaveCar, randomItem);
		System.out.print("\nFinally you calm down after what has just happened, no longer with your " + randomItem
				+ ", you walk to find a village.");
		input.nextLine();
		crashedCar(leaveCar); // Passes the randomly generated number through to the method
		System.out.print("\nWhen you reach the village, you find that there are no taxis, apart from one suspicious looking taxi.");
		input.nextLine();
		System.out.print("\nYou hop in the taxi as you have no other options. "
				+ "As you climb in, you find yourself sitting next to the thief from earlier, how did he get here?!");
		input.nextLine();
		
		int thief = 1 + (int) (Math.random() * ((3 - 1) + 1)); // Random number generator to decide what happens next in the story
		thiefEvent(thief); // Passes the randomly generated number through to the method
		if (thief == 1) { // If the randomly generated number is one, then return end back to the main class
			return end;
		}
		System.out.print("\nThe taxi driver shrugs off what just happened and begins driving without you even telling him a destination.");
		input.nextLine();
		System.out.print("\nThe driver starts driving faster and faster, all without saying a word.");
		input.nextLine();
		System.out.print("\nEnter 1 if you want him to let you out, 2 if you want him to drive to the nearest police station,"
				+ " or 3 if you want to remain silent: ");		
		int taxiDriver = input.nextInt();
		input.nextLine();
		taxiDriverEvent(taxiDriver); // Passes the decision that the user has made through to the method
		if (taxiDriver != 3) { // If taxiDriver does not equal 3, return end
			return end;
		}
		System.out.print("\n30 minutes pass and the driver stops off at a unknown town,"
				+ " saying you are free to go and he goes off to find a nearby pub.");
		input.nextLine();
		System.out.print("\nWalking for what feels like an hour, you find a bus stop and after a few minutes, a bus turns up.");
		input.nextLine();
		System.out.print("\nOn the bus, you find that it is empty apart from you and the driver, until someone in a long black coat comes towards you.");
		input.nextLine();
		
		getRandomPerson(); // Calls method for a random person
		String randomPerson = getRandomPerson(); // Sets the random person from the method to the string 'randomPerson'
		System.out.print("\nThey sit down, taking off their coat you find " + randomPerson + " sitting next to you!");
		input.nextLine();
		System.out.print("\nIn a blind panic, you sprint down the buses walkway, jump out of the bus, and run down the street screaming.");
		input.nextLine();
		storyTime.benchEnding(); // Calls benchEnding method from main class
		return end;
	}

	private static void leaveCarChoice(int leaveCar, String randomItem) {
		if (leaveCar == 1) { // If leaveCar = 1
			System.out.print("\nYou run up to the thief, and the thief slashes your tyres, rendering the car useless.");
			input.nextLine();
			System.out.print("\nYou hit them over the head with your " + randomItem
					+ ", which knocks them out. You drop your " + randomItem + " in shock.");
			input.nextLine();
		} else if (leaveCar == 2) { // If leaveCar = 2
			System.out.print("\nYou shout at the thief and throw your " + randomItem
					+ ", which only smashes your windscreen and the thief drives off!");
			input.nextLine();
		} else if (leaveCar == 3) { // If leaveCar = 3
			System.out.print("\nYou are too scared to confront them, so you hide around the corner until they drive off. You drop your "
							+ randomItem + " in shock.");
			input.nextLine();
		}
	}

	private static void crashedCar(int leaveCar) {
		if (leaveCar != 1) { // If leaveCar = 1
			System.out.print("\nIn the distance you can see a car wrapped around a large oak tree. "
					+ "You get nearer to it to find that it is your car, with the thief nowhere to be seen.");
			input.nextLine();
		} else { // If leaveCar = 2 || leaveCar = 3
			System.out.print("\nYou really wish that your new car still had functional tyres, as your feet begin to hurt.");
			input.nextLine();
		}
	}

	private static void thiefEvent(int thief) {
		if (thief == 1) { // If thief = 1
			System.out.print("\nThe thief attacks you, and you begin to lose consciousness!");
			input.nextLine();
			storyTime.hospitalEnding(); // Calls hospitalEnding method from main class
		} else if (thief == 2) { // If thief = 2
			System.out.print("\nBefore you can even speak, the thief runs out the car and steals another car, he drives off before you can even react!");
			input.nextLine();
		} else if (thief == 3) { // If thief = 3
			System.out.print("\nThe thief begs for forgiveness, and compensates you for the damage to your car. \nHe then gets out the taxi and walks off.");
			input.nextLine();
		}
	}

	private static void taxiDriverEvent(int taxiDriver) {
		if (taxiDriver == 1) { // If taxiDriver = 1
			System.out.print("\nYou ask the taxi driver to let you out, and he does so for a \u00A320 tip.");
			input.nextLine();
			System.out.print("\nFinding yourself in the middle of nowhere, you wait several hours until a taxi drives past, he stops at the roadside.");
			input.nextLine();
			storyTime.taxiEnding(); // Calls taxiEnding method from main class
		} else if (taxiDriver == 2) { // If taxiDriver = 2
			System.out.print("\nYou ask the taxi driver to take you to a police station,"
					+ " but he takes it personally and intentionally smashes into a brick wall whilst doing 60mph!");
			input.nextLine();
			storyTime.hospitalEnding(); // Calls hospitalEnding method from main class
		} else if (taxiDriver == 3) { // If taxiDriver = 3
			System.out.print("\nYou keep quiet and the taxi driver continues to drive at very high speeds.");
			input.nextLine();
		}
	}


	private static String getRandomItem() {
		ArrayList<String> chestItem = new ArrayList<String>();

		// List of items that could be given at random
		chestItem.add("hammer");
		chestItem.add("shovel");
		chestItem.add("rock");
		chestItem.add("coca-cola bottle");
		chestItem.add("shoe");
		chestItem.add("dinner plate");
		chestItem.add("vase");

		// Get Random Chest Item from Arraylist using Random().nextInt()
		String randomItem = chestItem.get(new Random().nextInt(chestItem.size()));
		return randomItem;
	}

	private static String getRandomPerson() {
		ArrayList<String> person = new ArrayList<String>();

		// List of characters that could be given at random
		person.add("a man with scars all over his face");
		person.add("several dogs stood on top of each other in a suit");
		person.add("a woman in a clown outfit");
		person.add("an ogre");
		person.add("a cat in a hat");
		person.add("a talking snowman");
		person.add("Quasimodo");

		// Get Random Person from Arraylist using Random().nextInt()
		String randomPerson = person.get(new Random().nextInt(person.size()));
		return randomPerson;
	}
}
