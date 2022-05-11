package cinema;

import java.util.Scanner;

public class Cinema {

	public static void main(String[] args) {

		System.out.println("Welcome to Rhyl Cinema, home of the most recent and popular films, all for a low price!"); // Introduction.

		Scanner input = new Scanner(System.in);
		String[] filmList = { "1.Shrek", "2.Finding Nemo", "3.A cat", "4.Dogs" }, // Array of film list.
				concesList = { "Two large cokes", "Two medium popcorns", "One chocolate bar and one bag of sweets" }; // Array of items within the concession pack.
		double totalChildCost, totalAdultCost, totalTicketCost;
		final double adultPrice = 5.25, childPrice = 3.60, concesPrice = 4.25;
		String mainBooker, ticketChoice, ticketAns, premiumSeatsAns, concesAns, memberAns, exitAns;
		boolean addOrder = false;

		do {
			boolean moreTickets = true, ans2 = false, ans3 = false, ans4 = false, ans5 = false;
			int childAge, adultTicketCount = 0, childTicketCount = 0, iter;

			// Takes the name of the main booker, which is used within the personalized welcome message.
			System.out.println("\nWhat is the first name of the main booker?");
			mainBooker = input.nextLine();

			// Welcomes the user using the inputed name, and lists the prices of the tickets, as well as information on the upgraded seating.
			System.out.println("\nHello, " + mainBooker
					+ ", ticket prices are £5.25 for adults, £3.60 for children aged 0-17 years old,\nand an additional 3% to the total ticket price if you want upgraded seating!");
			
			// Lists the films shown.
			System.out.print("\nToday's films shown in the two screens are: \n");
			for (iter = 0; iter < filmList.length; iter++) { // Loops until all films within the array are listed.
				System.out.print(filmList[iter] + "\n");
			}

			do { // While loop of adding tickets.
				System.out.println("\nDo you want a child or adult ticket? \nPlease type C for Child \nType A for Adult");
				ticketChoice = input.nextLine();
							
				switch (ticketChoice.toLowerCase()) { // Switch statement entered once ticket choice has been entered.
				case "c": // If user inputs 'C' for child ticket.
					System.out.print("\nPlease input the child's age: "); // Inputs the child's age to check against the age restrictions.
					childAge = input.nextInt();
					input.nextLine();

					if (childAge >= 0 && childAge <= 17) { // If child's age is greater than or equal to 0, and is less than or equal to 17. 
						System.out.println("\nThis age is within the child ticket requirement, thank you.");
						childTicketCount++; // Adds to the overall child ticket count.
						System.out.println("\nA child ticket has been added!\nCurrent child ticket count is = "
								+ childTicketCount + "\nCurrent adult ticket count is = " + adultTicketCount); // Prints the current total child and adult ticket count.
						break;
					} else {
						System.out.println(
								"\nThis age is not within the child ticket requirement, and will now be added as an adult ticket.");
						adultTicketCount++; // Adds to the overall adult ticket count.
						System.out.println("\nAn adult ticket has been added!\nCurrent child ticket count is = "
								+ childTicketCount + "\nCurrent adult ticket count is = " + adultTicketCount); // Prints the current total child and adult ticket count.
						break;
					}

				case "a":
					adultTicketCount++; // Adds to the overall adult ticket count.
					System.out.println("\nAn adult ticket has been added!\nCurrent child ticket count is = "
							+ childTicketCount + "\nCurrent adult ticket count is = " + +adultTicketCount); // Prints the current total child and adult ticket count.
					break;

				default:
					System.out.println("\nError incorrect input, please enter C or A."); // If the user's input is not 'C' or 'A'.
					break;
				}
				
				// Asks the user if they wish to add a ticket or continue through the order.
				System.out.println("\nDo you want to add a ticket?\nPlease type Y for Yes\nOr type N for No ");
				ticketAns = input.nextLine();
				boolean ans = false;
				while (ans == false) { // Loops until the user input matches the requirements.
					switch (ticketAns.toLowerCase()) {
					case "y": // Will re-loop and allow for an extra ticket to be added.
						ans = true;
						break;

					case "n": // Will break out of the loop and continue with the remainder of the order.
						moreTickets = false;
						ans = true;
						break;

					default: // The user has no input 'Y' or 'N', and will prompt them to retry.
						System.out.println("\nPlease enter Y for yes, or N for no.");
						System.out.println("\nDo you want to add a ticket?\nPlease type Y for Yes\nOr type N for No ");
						ticketAns = input.nextLine();
						break;
					}
				}
			} while (moreTickets);

			totalChildCost = childTicketCount * childPrice; // Total child ticket count is times by 3.60 to give the total cost for the current child tickets.
			totalAdultCost = adultTicketCount * adultPrice; // Total adult ticket count is times by 5.25 to give the total cost for the current adult tickets.
			totalTicketCost = totalChildCost + totalAdultCost; // Total ticket cost equals the total cost of child tickets plus total cost of adult tickets.
			System.out.println("\nYour total ticket cost is £" + String.format("%.2f", totalTicketCost)); // Prints out the total ticket cost, rounded to two decimal places.

			System.out.println("\nWould you like to opt for our new and improved premium seating at just 3% extra on your seat tickets?\nPlease type Y for Yes \nOr type N for No ");
			premiumSeatsAns = input.nextLine();

			do { // Loops until the user input matches the requirements.
				switch (premiumSeatsAns.toLowerCase()) {
				case "y": // User opts for premium seating.
					totalTicketCost = totalTicketCost * 1.03; // Total ticket cost has the added 3% charge for premium seating.
					System.out.println("\nYou have opted for premium seating, so your ticket cost will now be £" + String.format("%.2f", totalTicketCost)); 
					ans2 = true;
					break;

				case "n": // User opts out of premium seating.
					System.out.println("\nYou have opted out of the premium seating, so your ticket cost will remain £" + String.format("%.2f", totalTicketCost));
					ans2 = true;
					break;

				default: // User fails to input 'Y' or 'N'.
					System.out.println("Please enter Y for yes, or N for no.");
					System.out.println("\nWould you like to opt for the premium seating at just 3% extra on your seat tickets?");
					premiumSeatsAns = input.nextLine();
					break;
				}
			} while (ans2 == false);
			System.out.print("\nNow that the tickets are out of the way, would you like our concessions pack? \nIt includes the following refreshments: \n");			
			for (iter = 0; iter < concesList.length; iter++) { // Loops until the concession pack's contents have been listed from the array.
				System.out.print(concesList[iter] + "\n");
			}
			System.out.println("\nThe concessions pack costs a cheap price of £" + concesPrice
					+ "\nWould you like to add the pack to your order?\nPlease type Y for Yes\nOr type N for No"); // Asks the user if they want to add the concession pack.
			concesAns = input.nextLine();

			do { // Loops until the user input matches the requirements.
				switch (concesAns.toLowerCase()) {
				case "y": // User adds concession pack to order.
					totalTicketCost = totalTicketCost + concesPrice; // £4.25 is added to the order cost.
					System.out.println("\nYou have added the pack to your order, so your total cost will now be £"
							+ String.format("%.2f", totalTicketCost));
					ans3 = true;
					break;

				case "n": // User does not add the concession pack to the order.
					System.out.println("\nYou have not added the pack, so your order cost will remain £"
							+ String.format("%.2f", totalTicketCost));
					ans3 = true;
					break;

				default: // User fails to input 'Y' or 'N'.
					System.out.println("Error incorrect input, please enter Y for yes or N for no.");
					System.out.println("\nWould you like to add the pack to your order?");
					concesAns = input.nextLine();
					break;
				}
			} while (ans3 == false);
			
			// To end the order, the user will receive a 7% discount on their total order if they are a member of the cinema club.			
			System.out.println("\nFinalizing the order, are you a member of the cinema club?\nPlease type Y for Yes\nOr type N for No");
			memberAns = input.nextLine();

			do { // Loops until the user input matches the requirements.
				switch (memberAns.toLowerCase()) {
				case "y": // User is a member and receives a 7% discount on their total order cost.
					totalTicketCost = totalTicketCost * 0.93; // Total order cost is updated to the discounted cost.
					System.out.println(
							"\nDue to you being a member of the cinema, you have got a 7% discount off your total order, so your total cost will now be £"
									+ String.format("%.2f", totalTicketCost) + "\nThank you for being a valued member of the cinema club!");
					ans4 = true;
					break;

				case "n": // User is not a member and so they do not receive the discount.
					System.out.println("\nSince you are not a member of the cinema club, your order cost will remain £" + String.format("%.2f", totalTicketCost));
					ans4 = true;
					break;

				default: // User does not input 'Y' or 'N'.
					System.out.println("Error incorrect input, please enter Y for yes or N for no.");
					System.out.println("\nAre you a member of the cinema club?");
					memberAns = input.nextLine();
					break;
				}
			} while (ans4 == false);
			
			System.out.print("\nThat concludes the order, your total order cost is £" + String.format("%.2f", totalTicketCost) + ", which is payable via card or cash.");
			System.out.print("\nTo exit this interface, please enter E to exit, or R to reorder: ");
			exitAns = input.nextLine();
			
			do { // Loops until the user input matches the requirements.
				switch (exitAns.toLowerCase()) {
				case "e": // Program exits, thanking the main booker by name.
					System.out.println("\nThank you for your custom, " + mainBooker + ", please enjoy your film!");
					addOrder = true;
					ans5 = true;
					break;

				case "r": // Program re-loops so that an additional order can begin.
					addOrder = false;
					ans5 = true;
					break;

				default: // User does not input 'Y' or 'N'.
					System.out.print("Error incorrect input, please enter E to exit or R to reorder: ");
					exitAns = input.nextLine();
					break;
				}
			} while (ans5 == false);
		} while (addOrder == false);
		input.close();
	}
}