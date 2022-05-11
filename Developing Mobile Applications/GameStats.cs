using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class GameStats : MonoBehaviour
{
    public Text timeRemaining, brownChestCount, crystalChestCount, crystalTrophyCount, jugTrophyCount, skullyKillCount, archerKillCount,
        spikeKillCount, shieldKillCount;

    private void Start()
    {
        brownChestCount.text = brownChestCountUpdated.ToString();
        crystalChestCount.text = crystalChestCountUpdated.ToString();
        crystalTrophyCount.text = crystalTrophyCountUpdated.ToString();
        jugTrophyCount.text = jugTrophyCountUpdated.ToString();

        skullyKillCount.text = skullyKillCountUpdated.ToString();
        spikeKillCount.text = spikeKillCountUpdated.ToString();
        shieldKillCount.text = shieldKillCountUpdated.ToString();
        archerKillCount.text = archerKillCountUpdated.ToString();

        timeRemaining.text = updatedRemainingTime.ToString();
        timeRemaining.text = string.Format("{0:00}", updatedRemainingTime);
    }

    private static int brownChestCountUpdated;
    public static int BrownChestCountUpdated
    {
        get
        {
            return brownChestCountUpdated;
        }
        set
        {
            brownChestCountUpdated = value;
        }
    }

    private static int crystalChestCountUpdated;
    public static int CrystalChestCountUpdated
    {
        get
        {
            return crystalChestCountUpdated;
        }
        set
        {
            crystalChestCountUpdated = value;
        }
    }

    private static int crystalTrophyCountUpdated;
    public static int CrystalTrophyCountUpdated
    {
        get
        {
            return crystalTrophyCountUpdated;
        }
        set
        {
            crystalTrophyCountUpdated = value;
        }
    }

    private static int jugTrophyCountUpdated;
    public static int JugTrophyCountUpdated
    {
        get
        {
            return jugTrophyCountUpdated;
        }
        set
        {
            jugTrophyCountUpdated = value;
        }
    }

    private static int skullyKillCountUpdated;
    public static int SkullyKillCountUpdated
    {
        get
        {
            return skullyKillCountUpdated;
        }
        set
        {
            skullyKillCountUpdated = value;
        }
    }

    private static int spikeKillCountUpdated;
    public static int SpikeKillCountUpdated
    {
        get
        {
            return spikeKillCountUpdated;
        }
        set
        {
            spikeKillCountUpdated = value;
        }
    }

    private static int archerKillCountUpdated;
    public static int ArcherKillCountUpdated
    {
        get
        {
            return archerKillCountUpdated;
        }
        set
        {
            archerKillCountUpdated = value;
        }
    }

    private static int shieldKillCountUpdated;
    public static int ShieldKillCountUpdated
    {
        get
        {
            return shieldKillCountUpdated;
        }
        set
        {
            shieldKillCountUpdated = value;
        }
    }


    private static float updatedRemainingTime;
    public static float UpdatedRemainingTime
    {
        get
        {
            return updatedRemainingTime;
        }
        set
        {
            updatedRemainingTime = value;
        }
    }
}
