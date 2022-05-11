using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class PlayerCombat : MonoBehaviour
{
    public Animator player, skully1, skully2, archer1, archer2, spike1, spike2, shield1, shield2;
    public Transform attackingPos;
    public float attackRange = 0.5f;
    public LayerMask enemyLayer;
    public int enemiesKilledCount = 0, skullyKilledCount = 0, shieldKilledCount = 0, archerKilledCount = 0,
        spikeKilledCount = 0;
    [SerializeField] private Text enemyKilledCount;

    // Update is called once per frame
    void Update()
    {

    }

    public void Attack()
    {
        // Trigger attack animation
        player.SetTrigger("Attack");

        // Detect if enemies are within range
        Collider2D[] hitEnemies = Physics2D.OverlapCircleAll(attackingPos.position, attackRange, enemyLayer);

        // Kill these enemies
        foreach(Collider2D enemy in hitEnemies)
        {
            switch (enemy.name)
            {
                case "Skully1":
                    skully1.SetBool("isDead", true);
                    skully1.GetComponent<Rigidbody2D>().bodyType = RigidbodyType2D.Static;
                    skully1.GetComponent<Collider2D>().enabled = false;
                    skullyKilledCount++;

                    // Updating count to display on win or lose screen.
                    GameStats.SkullyKillCountUpdated = skullyKilledCount;
                    enemiesKilledCount++;
                    enemyKilledCount.text = enemiesKilledCount.ToString();
                    break;


                case "Skully2":
                    skully2.SetBool("isDead", true);
                    skully2.GetComponent<Rigidbody2D>().bodyType = RigidbodyType2D.Static;
                    skully2.GetComponent<Collider2D>().enabled = false;
                    skullyKilledCount++;

                    // Updating count to display on win or lose screen.
                    GameStats.SkullyKillCountUpdated = skullyKilledCount;
                    enemiesKilledCount++;
                    enemyKilledCount.text = enemiesKilledCount.ToString();
                    break;

                case "Archer1":
                    archer1.SetBool("isDead", true);
                    archer1.GetComponent<Rigidbody2D>().bodyType = RigidbodyType2D.Static;
                    archer1.GetComponent<Collider2D>().enabled = false;
                    archerKilledCount++;

                    // Updating count to display on win or lose screen.
                    GameStats.ArcherKillCountUpdated = archerKilledCount;
                    enemiesKilledCount++;
                    enemyKilledCount.text = enemiesKilledCount.ToString();
                    break;

                case "Archer2":
                    archer2.SetBool("isDead", true);
                    archer2.GetComponent<Rigidbody2D>().bodyType = RigidbodyType2D.Static;
                    archer2.GetComponent<Collider2D>().enabled = false;
                    archerKilledCount++;

                    // Updating count to display on win or lose screen.
                    GameStats.ArcherKillCountUpdated = archerKilledCount;
                    enemiesKilledCount++;
                    enemyKilledCount.text = enemiesKilledCount.ToString();
                    break;

                case "Spike1":
                    spike1.SetBool("isDead", true);
                    spike1.GetComponent<Rigidbody2D>().bodyType = RigidbodyType2D.Static;
                    spike1.GetComponent<Collider2D>().enabled = false;
                    spikeKilledCount++;

                    // Updating count to display on win or lose screen.
                    GameStats.SpikeKillCountUpdated = spikeKilledCount;
                    enemiesKilledCount++;
                    enemyKilledCount.text = enemiesKilledCount.ToString();
                    break;

                case "Spike2":
                    spike2.SetBool("isDead", true);
                    spike2.GetComponent<Rigidbody2D>().bodyType = RigidbodyType2D.Static;
                    spike2.GetComponent<Collider2D>().enabled = false;
                    spikeKilledCount++;

                    // Updating count to display on win or lose screen.
                    GameStats.SpikeKillCountUpdated = spikeKilledCount;
                    enemiesKilledCount++;
                    enemyKilledCount.text = enemiesKilledCount.ToString();
                    break;

                case "Shield1":
                    shield1.SetBool("isDead", true);
                    shield1.GetComponent<Rigidbody2D>().bodyType = RigidbodyType2D.Static;
                    shield1.GetComponent<Collider2D>().enabled = false;
                    shieldKilledCount++;

                    // Updating count to display on win or lose screen.
                    GameStats.ShieldKillCountUpdated = shieldKilledCount;
                    enemiesKilledCount++;
                    enemyKilledCount.text = enemiesKilledCount.ToString();
                    break;

                case "Shield2":
                    shield2.SetBool("isDead", true);
                    shield2.GetComponent<Rigidbody2D>().bodyType = RigidbodyType2D.Static;
                    shield2.GetComponent<Collider2D>().enabled = false;
                    shieldKilledCount++;

                    // Updating count to display on win or lose screen.
                    GameStats.ShieldKillCountUpdated = shieldKilledCount;
                    enemiesKilledCount++;
                    enemyKilledCount.text = enemiesKilledCount.ToString();
                    break;
            }
        }
    }

    private void OnDrawGizmosSelected()
    {
        if (attackingPos == null)
        {
            return;
        }

        Gizmos.DrawWireSphere(attackingPos.position, attackRange);
    }
}
