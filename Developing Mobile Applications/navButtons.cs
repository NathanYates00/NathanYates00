using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class navButtons : MonoBehaviour
{
    public int lvlSelected = 1;

    // This will go to the main menu when the button is clicked
    public void GoToMainMenu()
    {
        SceneManager.LoadScene(0);
    }

    // This will go to the game when the button is clicked
    public void GoToGame()
    {
        lvlSelected = SettingsClass.UpdatedLvlSelection;

        switch (lvlSelected)
        {
            case 1:
                SceneManager.LoadScene(1);
                break;

            case 2:
                SceneManager.LoadScene(2);
                break;

            case 3:
                SceneManager.LoadScene(3);
                break;

            default:
                SceneManager.LoadScene(1);
                break;
        }
    }

    // This will go to the instructions when the button is clicked
    public void GoToInstructions()
    {
        SceneManager.LoadScene(4);
    }

    // This will go to the options when the button is clicked
    public void GoToOptions()
    {
        SceneManager.LoadScene(5);
    }

    public void GoToNextLevel()
    {
        lvlSelected = SettingsClass.UpdatedLvlSelection;

        switch (lvlSelected)
        {
            case 1:
                lvlSelected = 2;
                SettingsClass.UpdatedLvlSelection = lvlSelected;
                SceneManager.LoadScene(2);
                break;

            case 2:
                SceneManager.LoadScene(3);
                lvlSelected = 3;
                SettingsClass.UpdatedLvlSelection = lvlSelected;
                break;

            case 3:
                SceneManager.LoadScene(1);
                lvlSelected = 1;
                SettingsClass.UpdatedLvlSelection = lvlSelected;
                break;

            default:
                lvlSelected = 2;
                SettingsClass.UpdatedLvlSelection = lvlSelected;
                SceneManager.LoadScene(2);
                break;
        }
    }

    public void ReplayLevel()
    {
        lvlSelected = SettingsClass.UpdatedLvlSelection;

        switch (lvlSelected)
        {
            case 1:
                SceneManager.LoadScene(1);
                break;

            case 2:
                SceneManager.LoadScene(2);
                break;

            case 3:
                SceneManager.LoadScene(3);
                break;

            default:
                SceneManager.LoadScene(1);
                break;
        }
    }

    // This will quit the program when the button is clicked
    public void ExitProgram()
    {
        Application.Quit();
    }
}
