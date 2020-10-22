## My Hero Team

### Goal

Create a web-based game to view and manage user hero and team

### User Story
- As user, I want to create a new hero
- As user, I want to create a new team with existing hero
- As a user, I want to view my teams I created before

### Requirement
- Database
    - DB Name: codetest
- URL
    - /myheroes/ -  Show User's Teams
    - /myheroes/createhero - A page that has a form to create a new hero
    - /myheroes/createteam - A page that has a form to create a new team
- Hero Attributes
    - Hero Name
        - type: String
    - Side
        - type: String
        - description: Either light or dark side
    - Hit Points
        - type: double
        - description: Maximum amounts of damage that a hero can take
    - Attack
        - type: double
        - description: Amount of damage 
    - Special Ability
        - type: String
        - description: Hero unique ability
- Team Attributes
    - Team Name
        - type: String
    - Side (Light or dark)
        - type: String
    - Heros - only allow to choose in one side 
    - Combat power - Calculate based on heros(Hit Point and Attack) in the team
    
### System Design
**Scenario**
- Need to create some hero(both sides) before create a team
- list all the teams including hero properties

**Security**
- Authentication
    - Using OAuth 2.0 to manage API Authentication

**Service**
- User Service
    - UserService.getCurrentUser()
- Hero Service
    - HeroService.createHero(heroFormData)
    - HeroService.getHeros(side)
- Team Service
    - TeamService.createTeam(TeamFormData)
    - TeamService.getTeams(UserId)
- Combat Service
    - CombatService.calculateCombatPower(TeamId) TBD

**API**
- POST /api/hero
- POST /api/Teams
- GET  /api/teams

**Storage**

Database
- InnoDB engine Mysql Database
- Using Transaction when storing data
- Table
    - user
        - id (primary_key)
        - name: varchar(100)
        - created_at: timestamp
    - hero
        - id (primary_key)
        - name: varchar(100)
        - side: varchar(20)
        - hit_points: double
        - attack: double
        - special_ability: varchar(100)
        - user_id: (foreign_key)
        - created_at: timestamp
        - updated_at: timestamp
    - team
        - id (primary_key)
        - name: varchar(100)
        - side: varchar(20)
        - user_id: (foreign_key) user_id
        - created_at: timestamp
        - updated_at: timestamp
    - team_heros
        - id (primary_key)
        - team_id: (foreign_key)
        - hero_id: (foreign_key)
        - created_at: timestamp
        - updated_at: timestamp
        - deleted_at: timestamp

**Scale**

Cached team combat power may speed up the team info request



