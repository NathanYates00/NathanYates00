/* This program is designed to let the user input and find the answer to 
   five different types of mathematical questions */

package doctors;

import java.util.Scanner; // java.util.Scanner is imported to allow for user input.
import java.util.InputMismatchException; //java.util.InputMismatchException is imported as part of the try catch in the code below.

public class doctors {

	public static void main(String[] args) {

		// The scanners are present to allow the String and Int inputs from the user.
		Scanner inputString = new Scanner(System.in);
		Scanner inputInt = new Scanner(System.in);

		String firstName, surname, sex, town, postcode, answer;
		int age = 0;
		int telephone = 0;

		System.out.println("Hello, welcome to your online doctors.");

		// The user is presented with multiple personal questions to input their details.
		System.out.print("\nPlease enter your first name: ");
		firstName = inputString.nextLine();

		System.out.print("Please enter your surname: ");
		surname = inputString.nextLine();

		try {
			System.out.print("Please enter your age: ");
			age = inputInt.nextInt();

			System.out.print("Please enter your telephone number: ");
			telephone = inputInt.nextInt();

			// The catch is present to stop the user from inputting String into a Int input.
		} catch (InputMismatchException ex) { // Importing java.util.InputMismatchException allows this to work.

			// In the event that the user inputs String into a Int input, the system will output the error message.
			System.out.print("\nError - Input must be a whole number only.");
			System.exit(0);
		}

		System.out.print("Please enter your sex (Male or Female): ");
		sex = inputString.nextLine();

		while (!sex.equalsIgnoreCase("Male") && !sex.equalsIgnoreCase("Female")) {
			System.out.print("\nInvalid response.\nPlease enter your sex (Male or Female): ");
			sex = inputString.nextLine();
		}

		System.out.print("Please enter your town: ");
		town = inputString.nextLine();

		System.out.print("Please enter your postcode: ");
		postcode = inputString.nextLine();

		// The user's details are now output in a neat format.
		// \n allows a line between, and \t allows spaces from the border.
		System.out.println("\n\t\t--------------------------------");
		System.out.println("\t\t--- First name: " + firstName + " ---");
		System.out.println("\t\t--- Surname: " + surname + " ---");
		System.out.println("\t\t--- Age: " + age + " ---");
		System.out.println("\t\t--- Sex: " + sex + " ---");
		System.out.println("\t\t--- Town: " + town + " ---");
		System.out.println("\t\t--- Postcode: " + postcode + " ---");
		System.out.println("\t\t--- Telephone number: " + telephone + " ---");
		System.out.println("\t\t--------------------------------");

		// If the user is male.
		if (sex.equalsIgnoreCase("Male")) {
			// If the user is greater or equal to 18 years old, they will be classed as a man.
			if (age >= 18) {
				System.out.println("\n" + firstName + " is a man.");
			}
			// If the user is less than 18 years old, they will be classed as a boy.
			if (age < 18) {
				System.out.println("\n" + firstName + " is a boy.");

			}
		}

		// If the user is female.
		if (sex.equalsIgnoreCase("Female")) {
			// If the user is greater or equal to 18 years old, they will be classed as a woman.
			if (age >= 18) {
				System.out.println("\n" + firstName + " is a woman.");
			}
			// If the user is less than 18 years old, they will be classed as a girl.
			if (age < 18) {
				System.out.println("\n" + firstName + " is a girl.");

			}
		}
		// The user is asked if they are asthmatic. If answer yes or no is given, a corresponding message will be output.
		System.out.print("\nAre you asthmatic?: ");
		answer = inputString.nextLine();
		// If the user's input is not yes or no, a while loop will keep asking the question.
		while (!answer.equalsIgnoreCase("Yes") && !answer.equalsIgnoreCase("No")) {
			System.out.print("\nInvalid response.\nPlease enter your yes or no: ");
			answer = inputString.nextLine();
		}
		if (answer.equalsIgnoreCase("Yes")) {
			System.out.println(firstName + " needs a new asthma inhaler.");
		}
		if (answer.equalsIgnoreCase("No")) {
			System.out.println(firstName + " does not need an asthma inhaler.");
		}

		inputString.close();
		inputInt.close();
	}
}