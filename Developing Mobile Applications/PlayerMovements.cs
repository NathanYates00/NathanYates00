using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityStandardAssets.CrossPlatformInput;

public class PlayerMovements : MonoBehaviour
{
    private Rigidbody2D rigidbody;
    private Animator animator;
    private float movementSpeed;
    private float dirX;
    private bool facingRight = true;
    private Vector3 localScale;


    // Start is called before the first frame update
    private void Start()
    {
        rigidbody = GetComponent<Rigidbody2D>();
        animator = GetComponent<Animator>();
        localScale = transform.localScale;
        movementSpeed = 5f;
    }

    // Update is called once per frame
    private void Update()
    {
        dirX = CrossPlatformInputManager.GetAxis("Horizontal") * movementSpeed;

        if (CrossPlatformInputManager.GetButtonDown("Jump") && rigidbody.velocity.y == 0)
            rigidbody.AddForce(Vector2.up * 700f);


        if (Mathf.Abs(dirX) > 0 && rigidbody.velocity.y == 0)
            animator.SetBool("isRunning", true);
        else
            animator.SetBool("isRunning", false);


        if (rigidbody.velocity.y == 0)
        {
            animator.SetBool("isJumping", false);
            animator.SetBool("isFalling", false);
        }

        if (rigidbody.velocity.y > 0.3)
            animator.SetBool("isJumping", true);
            animator.SetBool("isRunning", false);

        if (rigidbody.velocity.y < 0)
        {
            animator.SetBool("isJumping", false);
            animator.SetBool("isRunning", true);
        }

        if (rigidbody.velocity.x > 0)
        {
            animator.SetBool("isRunning", true);
        }

        if (rigidbody.velocity.x < 0)
        {
            animator.SetBool("isRunning", true);
        }
    }

    private void FixedUpdate()
    {
        rigidbody.velocity = new Vector2(dirX, rigidbody.velocity.y);
    }

    private void LateUpdate()
    {
        if (dirX > 0)
            facingRight = true;
        else if (dirX < 0)
            facingRight = false;

        if (((facingRight) && (localScale.x < 0)) || ((!facingRight) && (localScale.x > 0)))
            localScale.x *= -1;

        transform.localScale = localScale;
    }
}

    //void MobileController()
    //{
    //    if (LeftMove)
    //    {
    //        rBody.velocity = new Vector2(-PlayerMovementSpeed * Time.deltaTime, 0);
     //   }
     
      //  else if (RightMove)
      //  {
      //      rBody.velocity = new Vector2(PlayerMovementSpeed * Time.deltaTime, 0);
      //  }

       // else if (UpMove)
       // {
//rBody.velocity = new Vector2(0, PlayerMovementSpeed * Time.deltaTime);
       // }

      //  else
      //  {
      //      rBody.velocity = Vector2.zero;
       // }
   // }

  //  public void OnLeftBtnPress(bool Pressed)
   // {
   //     LeftMove = Pressed;
   // }

   // public void OnRightBtnPress(bool Pressed)
   // {
   //     RightMove = Pressed;
   // }

   // public void OnUpBtnPress(bool Pressed)
  //  {
  //      UpMove = Pressed;
  //  }
//}
