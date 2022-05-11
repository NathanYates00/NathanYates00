using UnityEngine;
using UnityEngine.UI;

public class PlayerCollision : MonoBehaviour
{
    GameManager gameManager = new GameManager();
    [SerializeField] private Text trophyCounter;
    public int trophyCount = 0;
    public int brownChestCount = 0, crystalChestCount = 0, jugTrophyCount = 0, crystalTrophyCount = 0;
    public GameObject brownChest1, brownChest2, crystalChest1, crystalChest2, crystalTrophy1, crystalTrophy2,
        jugTrophy1, jugTrophy2, endTrophy;

    public void OnCollisionEnter2D(Collision2D collision)
    {
        switch (collision.collider.name)
        {
            case "BrownChest1":
                brownChestCount++;

                // Updating count to display on win or lose screen.
                GameStats.BrownChestCountUpdated = brownChestCount;
                trophyCount++;
                trophyCounter.text = trophyCount.ToString();
                brownChest1.SetActive(false);
                break;

            case "BrownChest2":
                brownChestCount++;
                GameStats.BrownChestCountUpdated = brownChestCount;
                trophyCount++;
                trophyCounter.text = trophyCount.ToString();
                brownChest2.SetActive(false);
                break;

            case "CrystalChest1":
                crystalChestCount++;
                GameStats.CrystalChestCountUpdated = crystalChestCount;
                trophyCount++;
                trophyCounter.text = trophyCount.ToString();
                crystalChest1.SetActive(false);
                break;

            case "CrystalChest2":
                crystalChestCount++;
                GameStats.CrystalChestCountUpdated = crystalChestCount;
                trophyCount++;
                trophyCounter.text = trophyCount.ToString();
                crystalChest2.SetActive(false);
                break;

            case "CrystalTrophy1":
                crystalTrophyCount++;
                GameStats.CrystalTrophyCountUpdated = crystalTrophyCount;
                trophyCount++;
                trophyCounter.text = trophyCount.ToString();
                crystalTrophy1.SetActive(false);
                break;

            case "CrystalTrophy2":
                crystalTrophyCount++;
                GameStats.CrystalTrophyCountUpdated = crystalTrophyCount;
                trophyCount++;
                trophyCounter.text = trophyCount.ToString();
                crystalTrophy2.SetActive(false);
                break;

            case "JugTrophy1":
                jugTrophyCount++;
                GameStats.JugTrophyCountUpdated = jugTrophyCount;
                trophyCount++;
                trophyCounter.text = trophyCount.ToString();
                jugTrophy1.SetActive(false);
                break;

            case "JugTrophy2":
                jugTrophyCount++;
                GameStats.JugTrophyCountUpdated = jugTrophyCount;
                trophyCount++;
                trophyCounter.text = trophyCount.ToString();
                jugTrophy2.SetActive(false);
                break;

            case "EndTrophy":
                endTrophy.SetActive(false);
                gameManager.EndGameWin();
                break;

            //case "Skully":
                //skullyKilledCount++;

                // Updating count to display on win or lose screen.
                // GameStats.SkullyKilledCountUpdated = skullyKilledCount;
                // enemiesKilledCount++;
                // enemiesKilledCounter.text = enemiesKilledCounter.ToString();
               // break;
        }
    }

    public void AttackEnemy(Collision2D collision)
    {
        switch (collision.collider.name)
        {
            case "Skully":

                break;
        }
    }
}
