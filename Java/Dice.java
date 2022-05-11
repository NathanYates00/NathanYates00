package dice;

import java.util.Scanner;

public class Dice {
	public static void main(String[] args) {

		System.out.print("\nHello, welcome to the online dice roll, enjoy and don't forget that you will always be luckier in the next round!"); // Introduction.
		String playerOne, playerTwo, playerThree, addGameAns;
		boolean extraGame = false;
		Scanner input = new Scanner(System.in);

		do {
			int gameCount = 1, numberOfRounds = 0;
			
			// User input will decide how many times the rounds are looped.
			System.out.print("\nPlease enter the number of rounds you want to play: "); 
			numberOfRounds = input.nextInt();
			input.nextLine(); // Present so the name input does not get skipped after pressing 'enter' on number of rounds input.

			// The three players will input their name, and referred to these names at the end of each round.
			System.out.print("\nPlease enter the name of player one: ");
			playerOne = input.nextLine();
			System.out.print("\nPlease enter the name of player two: ");
			playerTwo = input.nextLine();
			System.out.print("\nPlease enter the name of player three: ");
			playerThree = input.nextLine();

			while (gameCount <= numberOfRounds) { // Loop whilst game count is less than or equal to the number of rounds the user input earlier.
				System.out.print("\nPlease type 'R' to begin the rolling of the dice: ");
				String startPrompt = input.nextLine();
				if (startPrompt.equalsIgnoreCase("R")) {
					int dicePerRoll = 3, playerCount = 3, iter1 = 0, p1score = 0, p2score = 0, p3score = 0;

					while (iter1 < playerCount) { // Loop whilst iteration is less than the player count.
						System.out.print("- - - - - - - - - - - - - - -"); // For presentation only.
						System.out.print("\nPlayer " + (iter1 + 1) + ": "); // Displays the players 1 - 3 and what they have rolled.
						
						//Loop whilst the iteration is less than the dice per roll.
						for (int iter2 = 0; iter2 < dicePerRoll; iter2++) {
							int rolled = 1 + (int) (Math.random() * ((6 - 1) + 1)); // Generates three random numbers between 1 to 6 for each player.
							if (iter1 == 0) {
								p1score += rolled;
							}
							if (iter1 == 1) {
								p2score += rolled;
							}
							if (iter1 == 2) {
								p3score += rolled;
							}
							System.out.print(rolled + " ");
						}
						iter1++; // Adds to iteration until while loop criteria is met.
						System.out.println("");
					}
					int scenario = 0;
					if (p1score > p2score && p1score > p3score) { // If player one's score is higher than player two's and player three's scores.
						scenario = 1;
					}
					if (p2score > p1score && p2score > p3score) { // If player two's score is higher than player one's and player three's scores.
						scenario = 2;
					}
					if (p3score > p1score && p3score > p2score) { // If player three's score is higher than player one's and player two's scores.
						scenario = 3;
					}
					switch (scenario) {
					case 1: // Declares player one the winner of the current round.
						System.out.println("\n" + playerOne + " has won this round, better luck next round " + playerTwo + " and " + playerThree);
						break;
					case 2: // Declares player two the winner of the current round.
						System.out.println("\n" + playerTwo + " has won this round, better luck next round " + playerOne
								+ " and " + playerThree);
						break;
					case 3: // Declares player three the winner of the current round.
						System.out.println("\n" + playerThree + " has won this round, better luck next round "
								+ playerOne + " and " + playerTwo);
						break;
					default: // If all three player's scores equal the same number.
						System.out.println("\nThere has been a tie!");
						break;

					}
					gameCount++; // Adds to the game counter.
				} else { // Output if 'R' is not input by user.
					System.out.print("\nWrong input");
				}
			}
			
			System.out.print("\nThat is the end of this set of rounds."); // Output after all rounds have been played.
			
			// User inputs if they wish to exit the program, or restart program with a new game.
			System.out.println("\nTo exit this interface, please enter E to exit \nOr to play another set of rounds, please enter N to make a new game");
			addGameAns = input.nextLine();
			
			boolean exitAns = false;
			while (exitAns == false) { // While loop continues until 'e' or 'n' is input.			
				switch (addGameAns.toLowerCase()) {
				case "e": // Program will exit, outputting exit message.
					System.out.print("\nThank you for playing, make sure you come play again soon, goodbye for now!");
					extraGame = true;
					exitAns = true;
					break;

				case "n": // Program will reset to create a new game.
					extraGame = false;
					exitAns = true;
					break;

				default:
					System.out.print("\nError incorrect input"); // Error message output, user prompted to enter 'e' or 'n'.
					System.out.println("\nTo exit this interface, please enter E to exit \nOr to play another set of rounds, please enter N to make a new game");
					addGameAns = input.nextLine();
					break;
				}
			}
		} while (extraGame == false);
		input.close();
	}
}