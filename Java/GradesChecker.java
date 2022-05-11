package grades;

import java.util.Scanner;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class GradesChecker {
	public static void main(String[] args) {
		Scanner input = new Scanner(System.in);
		System.out.println("Welcome to the GLLM online marking tool, used and loved by teachers!"); // Introduction.
		boolean moreMarking = false;
		do {
			// Finds how many times to repeat the loop.
			System.out.println("\nHow many students would you like to grade? ");
			int students = input.nextInt();
			input.nextLine();

			// Creating arrays.
			String names[] = new String[students];
			float marks[] = new float[students];

			for (int iter = 0; iter < students; iter++) { // Taking student names.
				System.out.print("Student name: ");
				String name = input.nextLine();
				names[iter] = name; // Adding input names to names array.
			}

			int i = 0;
			while (i < students) { // Taking student marks.
				System.out.print(names[i] + "'s marks out of 100 (Half marks are to be included too): ");
				float mark = input.nextFloat();
				input.nextLine();

				if (mark <= 100 && mark >= 0) { // Validating input to be between 0 to 100.
					marks[i] = mark; // Adding input mark to marks array.
					i++;
				} else {
					System.out.println("Please input a number between 0 - 100"); // Message if validation fails.
				}
			}
			int passCount = 0, failCount = 0;
			
			// Loop through marks array and give grade accordingly.
			for (int iter = 0; iter < marks.length; iter++) {
				if (marks[iter] > 50) { // If student's marks are greater than 50.
					String studentGrade = "pass";
					System.out.println("\n" + names[iter] + " received a " + studentGrade + " from their mark of " + marks[iter]);					
					passCount++; // Adds to number of passes.
				}

				else if (marks[iter] == 50) { // If student's marks are equal to 50.
					String studentGrade = "one mark from failing";
					System.out.println("\n" + names[iter] + " was " + studentGrade + " with their mark of " + marks[iter]);					
					passCount++; // Adds to number of passes.
				}

				else { // If student's marks are below to 50.
					String studentGrade = "fail";
					System.out.println(
							"\n" + names[iter] + " received a " + studentGrade + " from their mark of " + marks[iter]);
					failCount++; // Adds to number of fails.
				}
			}
			// Prints the number of passes and fails.
			System.out.println("\nTotal number of students that passed : " + passCount + "\nTotal number of students that failed : " + failCount);

			boolean incorrectEmail = true;
			while (incorrectEmail == true) { // While loop for email input, continues until email given is valid.
				// Regex for email input. Minimum 6 Characters before @ sign (Eg. 311624@gllm.ac.uk).
				Pattern pattern = Pattern.compile("^[A-Z0-9!#$%&'*+-/=?^_`{|}~]{6,}+@[G][L][L][M]+\\.[A][C]\\.[U][K]$",Pattern.CASE_INSENSITIVE);
				System.out.print("\nPlease enter your GLLM email address: ");
				String email = input.nextLine();
				
				Matcher matcher = pattern.matcher(email); // Matches input to regex.
				boolean validEmail = matcher.find();

				if (validEmail) { // If given email is valid.
					System.out.println("Email valid? " + validEmail);
					incorrectEmail = false;
				} else if (!validEmail) { // If given email is invalid.
					System.out.println("\nEmail valid? " + validEmail);
					System.out.println("Invalid email entered, try again.");
				}
			}
			System.out.print("\nAll student grades have been sent to the email given");
			String exitAns;
			System.out.print("\nTo exit this interface, please enter E to exit, or M to do more marking: ");
			exitAns = input.nextLine();
			boolean exit = false;
			do { // While loop for exit prompt.
				switch (exitAns.toLowerCase()) {
				case "e": // If user inputs 'e', program exits.
					System.out.println(
							"\nThank you for using the GLLM online marking tool, please recommend us to other teachers!");
					moreMarking = true;
					exit = true;
					break;

				case "m": // If user inputs 'm', program restarts to begin further marking.
					moreMarking = false;
					exit = true;
					break;

				default: // If user inputs anything other than 'e' or 'm', error message output.
					System.out.print("Error incorrect input, please enter E to exit or M to do more marking: ");
					exitAns = input.nextLine();
					break;
				}
			} while (exit == false);
		} while (moreMarking == false);
		input.close();
	}
}