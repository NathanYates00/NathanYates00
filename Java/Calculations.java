// This program is designed to let the user input and find the answer to five different types of mathematical questions.

package calculations;

import java.util.Scanner; // java.util.Scanner is imported to allow for user input.
import java.lang.Math; // java.lang.Math is imported to allow Math.pow to operate, allowing the power calculation.
import java.util.InputMismatchException; //java.util.InputMismatchException is imported as part of the try catch in the code below.

public class Calculations {

	public static void main(String[] args) {

		// The scanner is present to allow inputs from the user.
		Scanner input = new Scanner(System.in);

		float a, b, ans;
		double ans2;
		System.out.println("Hello, welcome to the online calculator.");

		// The user is presented with five different options to choose from in their mathematical question.
		System.out.println("\nTo add, enter value 1");
		System.out.println("To subtract, enter value 2");
		System.out.println("To multiply, enter value 3");
		System.out.println("To divide, enter value 4");
		System.out.println("To find the power of a number, enter value 5");

		/*
		 * Once presented with the options, the user must choose one by entering a
		 * number between 1 and 5. If the user puts a number less than 1 or greater than
		 * 5, an error will be output informing the user that only a number between 1
		 * and 5, as their input must have not fit this requirement.
		 */
		System.out.print("\nEnter your choice: ");
		float choice = input.nextFloat();
		while (choice >= 6 || choice < 1) {
			System.out.print("Error - Please enter a number between 1 & 5. \nEnter your choice: ");
			choice = input.nextFloat();
		}

		/*
		 * This if statement is triggered if the user inputs a float value between 1 and
		 * 2, the '&&' operator means the input can be any float value between these two
		 * requirements ">=1 && <2", the float value can be 1 or over, as long as it is
		 * less than 2.
		 */

		// The try encapsulates the code, ending with the catch at the end of the code.
		try {

			/*
			 * This if statement is triggered if the user inputs a float value between 1 and
			 * 2, the '&&' operator means the input can be any float value between these two
			 * requirements ">=1 && <2", the float value can be 1 or over, as long as it is
			 * less than 2.
			 */
			if (choice >= 1 && choice < 2) {
				System.out.print("Please enter your first number: ");
				a = input.nextFloat();

				System.out.print("Please enter your second number: ");
				b = input.nextFloat();

				// The float value 'a' and 'b' inputed from the user are added together.
				ans = a + b;

				/*
				 * The answer is output for the user to see, additionally the answer is rounded
				 * to the first decimal place if applicable. This is done for the sake of the
				 * user, it tidies up the answer rather than a long number.
				 */
				System.out.printf("\nThe answer for " + a + " + " + b + " = " + "%.1f", ans);

				/*
				 * The modulus operator, '%', is used to return the remainder of the answer. If
				 * the value after the decimal place is equal to 0, then it will carry on to the
				 * nested if statements.
				 */
				if (ans % 1 == 0) {

					// If the answer divided by two returns a .0 value, then the initial answer is
					// an even number.
					if (ans % 2 == 0) {
						System.out.print("\n" + ans + " is an even number!");
					}
					/*
					 * If the answer divided by two returns a value that is not equal to 0, then the
					 * initial answer is an odd number.
					 */
					if (ans % 2 != 0) {
						System.out.print("\n" + ans + " is an odd number!");
					}
				}
				// The catch is present to stop the user from inputting String into a float
				// input.
			}
		} catch (InputMismatchException ex) { // Importing java.util.InputMismatchException allows this to work.

			// If the user inputs String into any float inputs, the system will output the
			// error message.
			System.out.print("Error - Input must be a number to continue.");
		}
		try {
			if (choice >= 2 && choice < 3) {

				System.out.print("Please enter your first number: ");
				a = input.nextFloat();

				System.out.print("Please enter your second number: ");
				b = input.nextFloat();

				// The float value 'a' and 'b' inputed from the user are subtracted.
				ans = a - b;

				System.out.printf("\nThe answer for " + a + " - " + b + " = " + "%.1f", ans);
				if (ans % 1 == 0) {
					if (ans % 2 == 0) {
						System.out.print("\n" + ans + " is an even number!");
					}
					if (ans % 2 != 0) {
						System.out.print("\n" + ans + " is an odd number!");
					}
				}
			}
		} catch (InputMismatchException ex) {
			System.out.print("Error - Input must be a number to continue.");
		}
		try {
			if (choice >= 3 && choice < 4) {
				System.out.print("Please enter your first number: ");
				a = input.nextFloat();

				System.out.print("Please enter your second number: ");
				b = input.nextFloat();

				// The float value 'a' and 'b' inputed from the user are multiplied.
				ans = a * b;

				System.out.printf("\nThe answer for " + a + " x " + b + " = " + "%.1f", ans);
				if (ans % 1 == 0) {
					if (ans % 2 == 0) {
						System.out.print("\n" + ans + " is an even number!");
					}
					if (ans % 2 != 0) {
						System.out.print("\n" + ans + " is an odd number!");
					}
				}
			}
		} catch (InputMismatchException ex) {
			System.out.print("Error - Input must be a number to continue.");
		}
		try {
			if (choice >= 4 && choice < 5) {
				System.out.print("Please enter your first number: ");
				a = input.nextFloat();

				System.out.print("Please enter your second number: ");
				b = input.nextFloat();

				// The float value 'a' and 'b' inputed from the user are divided.
				ans = a / b;

				System.out.printf("\nThe answer for " + a + " ÷ " + b + " = " + "%.1f", ans);
				if (ans % 1 == 0) {
					if (ans % 2 == 0) {
						System.out.print("\n" + ans + " is an even number!");
					}
					if (ans % 2 != 0) {
						System.out.print("\n" + ans + " is an odd number!");
					}
				}
			}
		} catch (InputMismatchException ex) {
			System.out.print("Error - Input must be a number to continue.");
		}
		try {
			if (choice >= 5 && choice < 6) {
				System.out.print("Please enter your base number: ");
				a = input.nextFloat();

				System.out.print("Please enter your exponent number: ");
				b = input.nextFloat();

				/*
				 * The float value 'a' is the base number, 'b' is the exponent number, this will
				 * find the power to the base number.
				 */
				// This is why java.lang.Math is imported, to allow the equation of finding the power of a number.
				ans2 = Math.pow(a, b);

				System.out.printf("\nThe answer for " + a + " ^ " + b + " = " + "%.1f", ans2);
				if (ans2 % 1 == 0) {
					if (ans2 % 2 == 0) {
						System.out.print("\n" + ans2 + " is an even number!");
					}
					if (ans2 % 2 != 0) {
						System.out.print("\n" + ans2 + " is an odd number!");
					}
				}
			}
		} catch (InputMismatchException ex) {
			System.out.print("Error - Input must be a number to continue.");
		}
		input.close();
	}
}