using System.Collections;
using System.Collections.Generic;
using System.Globalization;
using UnityEngine;
using UnityEngine.UI;
using System.IO;
using System.Linq;
using System;
using UnityEngine.SceneManagement;

public class recordTime : MonoBehaviour
{
    public Text printTimeTxt, textJobNumber;
    public Button recordBtn;
    public string path, time, polyType, jobNum;

    // Run starts at 1
    public int run;
     
    public void JobNumberInput(string val)
    {
        // To display on top of run sheet
        jobNum = val;
        JobInfo.UpdatedJobNum = jobNum;
    }

    public void PolyType(int val)
    {
        // To display on top of run sheet
        switch (val)
        {
            case 1:
                polyType = "65A";
                break;

            case 2:
                polyType = "80A";
                break;

            case 3:
                polyType = "95A";
                break;

            case 4:
                polyType = "65D";
                break;

            case 5:
                polyType = "80D";
                break;

            case 6:
                polyType = "95D";
                break;
        }
        JobInfo.UpdatedPolyType = polyType;
    }

    public void PrintTime()
    {
        run = 1;

        // File Path
        path = Application.persistentDataPath + "/TimeLog.txt";

        if (File.Exists(path))
        {
            // Reads the last line of the text file
            var lastLine = File.ReadLines(path).Last();
            int i = 4;
            string num = "";
            while (lastLine[i].ToString() != " ") // While the space in position i is not blank
            {
                num += lastLine[i]; // Append character in position i to num
                i++; // Shift position one to the right
            }
            run = int.Parse(num);
            run++;
        }
        string time = System.DateTime.UtcNow.ToLocalTime().ToString("Run " + run + " - HH : mm (dd/MM/yy)");
        printTimeTxt.text = time;
        CreateText(time);
    }

    public void CreateText(string time)
    {
        run = 1;

        // File Path
        path = Application.persistentDataPath + "/TimeLog.txt";

        // If File does not exist, create a file
        if (!File.Exists(path))
        {
            File.WriteAllText(path, "Recorded times of the day\nJob number = M-" + JobInfo.UpdatedJobNum + ", poly type = " + JobInfo.UpdatedPolyType);
            string content = "\n\n" + time;  // File content
            File.AppendAllText(path, content); // Adds recorded time and date to file
        }

        else
        {
            // Reads the last line of the text file
            var lastLine = File.ReadLines(path).Last();
            int i = 4;
            string num = "";         
            while (lastLine[i].ToString() != " ") // While the space in position i is not blank
            {
                num += lastLine[i]; // Append character in position i to num
                i++; // Shift position one to the right
            }
            run = int.Parse(num);
            run++;
            string content = "\n\n" + time;
            File.AppendAllText(path, content);
        }
    }

    public void GoToRuns()
    {   
        // If go to runs button is pressed, open runs page
        SceneManager.LoadScene(1);
    }

    public void GoToMainMenu()
    {
        // If go to main menu button is pressed, open main menu page
        SceneManager.LoadScene(0);
    }

    public void DeleteFile(string path)
    {
        // Deletes file storing runs, to start new day
        path = Application.persistentDataPath + "/TimeLog.txt";
        File.Delete(path);
    }
}
