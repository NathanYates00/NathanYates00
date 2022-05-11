using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class GameManager : MonoBehaviour
{ 
    float timeRemaining, minutes, seconds;
    public bool timeCountdown = false;
    public Text timeDisplayText, difficultyText;
    public string gameDifficulty;

    private void Start()
    {
        timeCountdown = true;
        gameDifficulty = SettingsClass.UpdatedDifficulty;

        switch (gameDifficulty)
        {
            case "Easy":
                timeRemaining = 150;
                difficultyText.text = "Easy";
                break;

            case "Normal":
                timeRemaining = 120;
                difficultyText.text = "Normal";
                break;

            case "Hard":
                timeRemaining = 90;
                difficultyText.text = "Hard";
                break;

            case "Insane":
                timeRemaining = 60;
                difficultyText.text = "Insane";
                break;

            default:
                timeRemaining = 120;
                difficultyText.text = "Normal";
                break;
        }
    }

    private void Update()
    {
        TimeDisplay(timeRemaining);

        if (timeCountdown)
        {
            if (timeRemaining > 0)
            {
                timeRemaining -= Time.deltaTime;
                GameStats.UpdatedRemainingTime = timeRemaining;
            }

            else
            {
                Debug.Log("Time has run out!");
                timeRemaining = 0;
                timeCountdown = false;
                timeDisplayText.text = "00:00";
                SceneManager.LoadScene(7);
            }
        }
    }

    public void TimeDisplay(float time)
    {
        minutes = Mathf.FloorToInt(time / 60);

        seconds = Mathf.FloorToInt(time % 60);

        timeDisplayText.text = string.Format("{0:00}:{1:00}", minutes, seconds);
    }

    public void EndGameWin()
    {
        SceneManager.LoadScene(6);
    }
}
