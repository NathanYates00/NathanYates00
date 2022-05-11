using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Audio;
using UnityEngine.UI;

public class settingsMenu : MonoBehaviour
{
    public AudioMixer audioMixer;
    public Slider difficultySlider, volumeSlider, lvlSelectSlider;
    public Text sliderValue, txtLvlSelected;
    public string gameDifficulty;
    public int lvlSelected;
    public float Volume;

    void Start()
    {
        lvlSelected = SettingsClass.UpdatedLvlSelection;
        Volume = SettingsClass.UpdatedVol;
        gameDifficulty = SettingsClass.UpdatedDifficulty;

        volumeSlider.value = Volume;

        switch (gameDifficulty)
        {
            case "Easy":
                difficultySlider.value = 0;
                break;

            case "Normal":
                difficultySlider.value = 1;
                break;

            case "Hard":
                difficultySlider.value = 2;
                break;

            case "Insane":
                difficultySlider.value = 3;
                break;
        }

        switch (lvlSelected)
        {
            case 1:
                lvlSelectSlider.value = 1;
                txtLvlSelected.text = "Stage One: Trophy Dash";
                break;

            case 2:
                lvlSelectSlider.value = 2;
                txtLvlSelected.text = "Stage Two: Undead Smash";
                break;

            case 3:
                lvlSelectSlider.value = 3;
                txtLvlSelected.text = "Stage Three: Out of time";
                break;
        }
    }

    void Update()
    {
        switch (difficultySlider.value)
        {
            case 0:
                sliderValue.text = "Easy";
                gameDifficulty = "Easy";
                break;

            case 1:
                sliderValue.text = "Normal";
                gameDifficulty = "Normal";
                break;

            case 2:
                sliderValue.text = "Hard";
                gameDifficulty = "Hard";
                break;

            case 3:
                sliderValue.text = "Insane";
                gameDifficulty = "Insane";
                break;
        }
        SettingsClass.UpdatedDifficulty = gameDifficulty;

        switch (lvlSelectSlider.value)
        {
            case 1:
                lvlSelected = 1;
                txtLvlSelected.text = "Stage One: Trophy Dash";
                break;

            case 2:
                lvlSelected = 2;
                txtLvlSelected.text = "Stage Two: Undead Smash";
                break;

            case 3:
                lvlSelected = 3;
                txtLvlSelected.text = "Stage Three: Out of time";
                break;
        }
        SettingsClass.UpdatedLvlSelection = lvlSelected;
    }

    public void SetVolume (float volume)
    {
        audioMixer.SetFloat("volume", volume);
        SettingsClass.UpdatedVol = volume;
    }
}
